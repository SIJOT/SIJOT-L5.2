<?php

namespace App\Http\Controllers;

use App\Rental;

use App\Http\Requests;
use App\User;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Fenos\Notifynder\Facades\Notifynder;
use Silber\Bouncer\Database\Role;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

/**
 * Class RentalController
 * @package App\Http\Controllers
 */
class RentalController extends Controller
{
    /**
     * @var string
     */
    protected $seoDescription;

    /**
     * RentalController constructor.
     *
     * The following middleware is defined here.
     *
     * Auth      = To see if the user is authencated.
     * rentalAcl = Role based middleware for the rental.
     */
    public function __construct()
    {
        $authControllers = ['indexAdmin', 'option', 'block', 'destroy', 'confirmed', 'download'];

        $this->middleware('auth', ['only' => $authControllers]);
        $this->middleware('rentalAcl', ['only' => $authControllers]);

        $this->seoDescription = 'Verhuur van onze lokalen.';
    }

    /**
     * Get the info page about the domain rental.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexFront()
    {
        // SEO:
        $this->seoMeta(['Sint-Joris', 'Scouts', 'Turnhout'], $this->seoDescription);
        $this->seoTwitter('Verhuur', $this->seoDescription);
        $this->seoFacebook('Verhuur', $this->seoDescription);

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
        // SEO:
        $this->seoMeta(['Sint-Joris', 'Scouts', 'Turnhout'], $this->seoDescription);
        $this->seoTwitter('Verhuur aanvraag', $this->seoDescription);
        $this->seoFacebook('Verhuur aanvraag', $this->seoDescription);

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
        // SEO:
        $this->seoMeta(['Sint-Joris', 'Scouts', 'Verhuur', 'bereikbaarheid'], $this->seoDescription);
        $this->seoTwitter('Verhuur bereikbaarheid', $this->seoDescription);
        $this->seoFacebook('Verhuur bereikbaarheid', $this->seoDescription);

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
        // SEO:
        $this->seoMeta(['Sint-Joris', 'Scouts', 'Verhuur', 'kalender'], $this->seoDescription);
        $this->seoTwitter('Verhuur kalender', $this->seoDescription);
        $this->seoFacebook('Verhuur kalender', $this->seoDescription);

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
        if ($type == 'all' || empty($type)) {
            $data['rentals'] = Rental::paginate(15);
        } elseif($type == 'new') {
            $data['rentals'] = Rental::where('status', 0)->paginate(15);
        } elseif($type == 'option') {
            $data['rentals'] = Rental::where('status', 1)->paginate(15);
        }

        return view('backend.rental.overview', $data);
    }

    /**
     * Download the rentals to a PDF file.
     *
     * @return mixed, stream of the pdf file.
     */
    public function download()
    {
        $data['date']    = Carbon::now();
        $data['rentals'] = Rental::all();

        // $pdf = PDF::loadView('pdf.rentals', $data);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf.rentals', $data);
        return $pdf->stream();
    }

    /**
     * Insert view for a backend rental insert.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert()
    {
        $data['title'] = 'Insert a new rental.';
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
        // TODO: Implement mailing logic UPDATE: Only change the notification mail.

        Rental::insert($input->except('_token'));

        $input = $input->all();

        // TODO: needs further debug methods.
        if (! auth()->check()) {
            Mail::send('emails.notification', ['input' => $input], function($mail) use ($input) {
                $mail->from('verhuur@st-joris-turnhout.be', 'Aanvraag verhuur');
                $mail->to($input['Email'], $input['Group']);
                $mail->subject('Er is een nieuwe verhuring aangevraagd');
            });

            // Data mail to the requester.
            Mail::send('emails.aanvraag', ['input' => $input], function ($mail) use ($input) {
                $mail->from('verhuur@st-joris-turnhout.be', 'Aanvraag verhuur');
                $mail->to($input['Email'], $input['Group']);
                $mail->subject('Scouts en Gidsen - Sint-joris. Verhuur aanvraag');
            });
        }

        if (auth()->check()) {
            $roles = Role::with('users')->whereIn('name', [ 'admin', 'developer', 'leiding' ])->get();

            foreach ($roles as $role) {
                foreach ($role->users as $user) {
                    Notifynder::category('rental.insert')
                        ->from(auth()->user()->id)
                        ->to($user->id)
                        ->url(route('backend.rental.overview', ['type' => 'all']))
                        ->send();
                }
            }
        }

        session()->flash('class', 'alert-success');
        session()->flash('message', trans('flashSession.rentalNew'));

        return redirect()->route('backend.rental.overview', ['type' => 'all']);
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

        $roles = Role::with('users')->whereIn('name', [ 'admin', 'developer', 'leiding' ])->get();

        foreach ($roles as $role) {
            foreach ($role->users as $user) {
                Notifynder::category('rental.delete')
                    ->from(auth()->user()->id)
                    ->to($user->id)
                    ->url(route('backend.rental.overview', ['type' => 'all']))
                    ->send();
            }
        }

        session()->flash('class', 'alert-success');
        session()->flash('message', trans('flashSession.rentalDelete'));

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
        Rental::find($id)->update(['Status' => 2]);
        $roles = Role::with('users')->whereIn('name', [ 'admin', 'developer', 'leiding' ])->get();

        foreach ($roles as $role) {
            foreach ($role->users as $user) {
                Notifynder::category('rental.confirm')
                    ->from(auth()->user()->id)
                    ->to($user->id)
                    ->url(route('backend.rental.overview', ['type' => 'all']))
                    ->send();
            }
        }

        session()->flash('class', 'alert-success');
        session()->flash('message', trans('flashSession.rentalConfirm'));

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
        Rental::find($id)->update(['Status' => 1]);
        $roles = Role::with('users')->whereIn('name', [ 'admin', 'developer', 'leiding' ])->get();

        foreach ($roles as $role) {
            foreach ($role->users as $user) {
                Notifynder::category('rental.option')
                    ->from(auth()->user()->id)
                    ->to($user->id)
                    ->url(route('backend.rental.overview', ['type' => 'all']))
                    ->send();
            }
        }

        session()->flash('class', 'alert-success');
        session()->flash('message', trans('flashSession.rentalOption'));

        return redirect()->back(302);
    }
}
