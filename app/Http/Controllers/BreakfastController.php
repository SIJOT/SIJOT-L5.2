<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class BreakfastController
 * @package App\Http\Controllers
 */
class BreakfastController extends Controller
{
    /**
     * Get the breakfast description.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = 'Het ontbijt';

        // SEO
        $this->seoMeta(['Sint-Joris Turnhout', 'Ontbijt'], 'Elke zondag van de maand');
        $this->seoTwitter('Ontbijt', 'Elke laatste zondag van de maand.');
        $this->seoFacebook('Elke laatste zondag van de maand', 'Ontbijt');

        return view('front-end.ontbijt', $data);
    }
}
