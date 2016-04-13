<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class PhotoController
 * @package App\Http\Controllers
 */
class PhotoController extends Controller
{
    // TODO: create factory.
    // TODO: create model.
    // TODO: create migration.
    
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
     * @param  string, $uri, the segment that get's the group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function photosTakSpecific($uri)
    {
        // TODO: Create view.
        // TODO: Implement SEO.
        // TODO: Build up the controller.
    }

    /**
     * Get the backend index.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexBackend()
    {
        // TODO: build view
        // TODO: add route.
        $data['title'] = '';
        $data['query'] = Photos::all();

        return view('', $data);
    }

    /**
     * Get the frontend index.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexFront()
    {
        // TODO: Implement SEO.
        // TODO: Create view.
        // TODO: Build up the controller.
    }

    /**
     * Upload a new album.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload()
    {
        // TODO: Build up the controller.
        // TODO: Implement notification.
    }
    
}
