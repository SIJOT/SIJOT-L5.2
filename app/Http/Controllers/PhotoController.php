<?php

namespace App\Http\Controllers;

use App\Photos;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

/**
 * Class PhotoController
 * @package App\Http\Controllers
 */
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
        $controllers = ['indexBackend', 'upload'];

        $this->middleware('auth', ['only' => $controllers]);
        $this->middleware('activeAcl', ['only' => $controllers]);
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

        $data['title']  = "Foto's";
        $data['photos'] = Photos::where('uri', $uri)->get();

        // SEO:
        $this->seoFacebook('Fotos', 'Fotos van scouts en gidsen Sint-Joris');
        $this->seoTwitter('Fotos', 'Fotos van scouts en gidsen Sint-Joris');
        $this->seoMeta(['sint-joris', 'scouts', 'turnhout'], 'Fotos van scouts en gidsen Sint-Joris');

        return view('front-end.photos', $data);
    }

    /**
     * Get the backend index.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexBackend()
    {
        // TODO: create view.

        $data['title']  = "Foto's";
        $data['photos'] = Photos::all();

        return view('backend.photo.index', $data);
    }

    /**
     * Get the frontend index.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexFront()
    {
        // SEO:
        $this->seoFacebook('Fotos', 'Fotos van scouts en gidsen Sint-Joris');
        $this->seoTwitter('Fotos', 'Fotos van scouts en gidsen Sint-Joris');
        $this->seoMeta(['sint-joris', 'scouts', 'turnhout'], 'Fotos van scouts en gidsen Sint-Joris');

        $data['title']  = "Foto's";
        $data['photos'] = Photos::all();

        return view('front-end.photos', $data);
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


    /**
     * Destroy a photo album.
     *
     * $param  int, $id, album id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $album = Photos::find($id);

        if (Storage::file($album->path)) {
            Storage::delete($album->path);
        }

        Photos::destroy($id);

        session()->flash('class', 'alert-success');
        session()->flash('message', 'Het album is verwijderd');
        
        return redirect()->back(302);
    }
}
