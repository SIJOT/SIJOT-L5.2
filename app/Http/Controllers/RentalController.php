<?php

namespace App\Http\Controllers;

use App\Rental;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
    public function __construct()
    {
        // Set the authencated routes.
    }

    /**
     * Get the info page about the domain rental.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexFront()
    {
        $data['title'] = 'Verhuur';
        return view('front-end.rentalIndex', $data);
    }

    /**
     * Front-end view for inserting a new rental request.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insertFront()
    {
        $data['title'] = 'Verhuur aanvragen';
        return view('front-end.rentalNew', $data);
    }

    /**
     * Get the info page about the domain access.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function domainAccess()
    {
        $data['title'] = 'Bereikbaarheid';
        return view('front-end.rentalAccess', $data);
    }

    /**
     * Get the rental calendar.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function calendar()
    {
        $data['title']   = 'verhuur Kalender';
        $data['rentals'] = Rental::where('status', 2)->get();
        return view('front-end.rentalCalendar', $data);
    }

    /**
     * Get all the requested rentals.
     *
     * @param  string $type, the database selector, where the data range will set on.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexAdmin($type)
    {
        if ($type == 'all' || empty($type))
        {
            $data['rentals'] = Rental::paginate(15);
        } elseif($type == 'new') {
            $data['rentals'] = Rental::where('status', 0)->paginate(15);
        } elseif($type == 'option') {
            $data['rentals'] = Rental::where('status', 1)->paginate(15);
        }

        return view('backend.rental.overview', $data);
    }

    /**
     * Insert view for a backend rental insert.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert()
    {
        $data['title'] = '';
        return view('backend.rental.insert', $data);
    }

    /**
     * Insert a new rental.
     *
     * @param  Requests\RentalValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\RentalValidator $input)
    {
        // TODO: Inject UNIX Timestamps
        // TODO: Implement mailing logic.

        Rental::insert($input->except('_token'));
        session()->flash('message', 'Nieuwe verhuring toegevoegd');

        $user = $input->all();

        if (! auth()->check()) {
            Mail::send('emails.notification', ['data' => $user], function($m) use ($notification) {
                $m->from('', '');
                $m->to('', '')->subject('');
            });
        }

        // Data mail to the requester.
        Mail::send('emails.aanvraag', ['user' => $user], function ($m) use ($user) {
            $m->from('verhuur@st-joris-turnhout.be', 'Aanvraag verhuur');
            $m->to($user['Email'], $user['Group'])->subject('Scouts en Gidsen - Sint-joris. Verhuur aanvraag');
        });

        return redirect()->back(302);
    }

    /**
     * Delete a rental.
     *
     * @param  int, $id, the rental id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Rental::destroy($id);
        session()->flash('message', 'U hebt een verhuring verwijderd');

        return redirect()->back(302);
    }

    /**
     * Set a rental to confirmed.
     *
     * @param  int, $id, the rental id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmed($id)
    {
        $rental = Rental::find($id);
        $rental->Status = 2;
        $rental->save();

        session()->flash('message', 'U hebt een verhuring de status bevestgd gegeven.');

        return redirect()->back(302);
    }

    /**
     * Set a rental to option status.
     *
     * @param  int, $id, The rental id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function option($id)
    {
        $rental = Rental::find($id);
        $rental->Status = 1;
        $rental->save();

        session()->flash('message', 'U hebt een verhuring de status optie gegeven');

        return redirect()->back(302);
    }
}
