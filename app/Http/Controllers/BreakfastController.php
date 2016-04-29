<?php

namespace App\Http\Controllers;

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
     */
    public function subScriptionView()
    {
        $data['title'] = '';
        return view('', $data); 
    } 
     
    /**
     * Delete a breakfast subscription.
     * 
     * @param int, $id, the id in the database.
     */
    public function delete($id) 
    {
        session()->flash('', ''); 
        session()->flash('', '');
        
        return redirect()->back(302);
    }

}
