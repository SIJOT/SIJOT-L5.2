<?php

namespace App\Http\Controllers;

use App\Breakfast;
use App\BreakfastMonths;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class BreakfastController
 *
 * @package Sijot_Website
 * @author  Tim Joosten <Topairy@gmail.com>
 */
class BreakfastController extends Controller
{
    /**
     * @var string
     */
    protected $seoDescription;

    /**
     * BreakfastController constructor.
     */ 
    public function __construct()
    {
        $this->seoDescription = 'Elke laaste zondag van de maand';
    }

    /**
     * Get the breakfast description.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = 'Het ontbijt';

        // SEO
        $this->seoMeta(['Sint-Joris Turnhout', 'Sint-Joris'], $this->seoDescription);
        $this->seoTwitter('Ontbijt', $this->seoDescription);
        $this->seoFacebook('Ontbijt', $this->seoDescription);

        return view('front-end.ontbijt', $data);
    }

    /**
     * Display the substription page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subScriptionView()
    {
        $data['title']  = 'Het ontbijt inschrijven';
        $data['months'] = BreakfastMonths::where('status', 1)->get();
        return view('front-end.ontbijt-subscription', $data);
    }

    public function store()
    {
        // TODO: add mailing logic.
        // TODO: Add redirect
        // TODO: add database store logic.
        // TODO: Add flash message
    }

    /**
     * Delete a breakfast subscription.
     *
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        Breakfast::destroy($request->get('id'));

        session()->flash('class', 'alert-success');
        session()->flash('message', 'De inschrijvingen zijn verwijderd.');
        
        return redirect()->back(302);
    }

}
