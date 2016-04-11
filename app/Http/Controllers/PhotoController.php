<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PhotoController extends Controller
{
    /**
     * PhotoController constructor.
     *
     * The following middleware is defined here.
     * --
     * auth     = To see if the user is authencated.
     * activeAcl = to see if the user is blocked or not.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activeAcl');
    }

    /**
     * Get all the photos from a specific group.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function photosTakSpecific()
    {
        
    }

    /**
     * Get the backend index.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexBackend()
    {

    }

    /**
     * Get the frontend index.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexFront()
    {

    }

    /**
     * Upload a new album.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload()
    {
        
    }
    
}
