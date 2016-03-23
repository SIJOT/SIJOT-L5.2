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


    /**
     * Show the update form off the mailing module.
     * 
     * @param  int, $id, the user his id in the data table.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        $data['title'] = 'mailing';
        $data['query'] = mailingUsers::find($id);

        return view('backend.mailing.update', $data);
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
