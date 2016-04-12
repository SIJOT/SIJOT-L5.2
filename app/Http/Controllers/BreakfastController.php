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
     * @var string
     */
    protected $seoDescription;

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
}
