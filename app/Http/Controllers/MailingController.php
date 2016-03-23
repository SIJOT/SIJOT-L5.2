<?php

namespace App\Http\Controllers;

use App\mailingUsers;
use Illuminate\Http\Request;

use App\Http\Requests;

class MailingController extends Controller
{
    /**
     * MailingController constructor.
     *
     * Here the following middleware will be set.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the index page for the mailing module.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = 'Mailing';
        $data['query'] = mailingUsers::with('tag')->paginate(15);

        return view('backend.mailing.index', $data);
    }

    public function mail()
    {

    }

    public function mailGroup()
    {
        
    }

    public function send()
    {

    }

    public function insert()
    {

    }

    public function store()
    {

    }

    public function update($id)
    {

    }

    /**
     * Delete a user out off the mailing module.
     *
     * @param  int, $id, the user his id in the data table.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($id)
    {
        mailingUsers::find($id)->tag()->sync([]);
        mailingUsers::destroy($id);

        session()->flash('message', '');

        return redirect()->back(302);
    }
}
