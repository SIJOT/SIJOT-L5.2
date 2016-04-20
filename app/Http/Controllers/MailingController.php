<?php

namespace App\Http\Controllers;

use App\mailingUsers;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class MailingController
 * @package App\Http\Controllers
 */
class MailingController extends Controller
{
    /**
     * MailingController constructor.
     *
     * Middleware:
     * --
     * auth      = to see if the user is authencated.
     * activeAcl = to see if the user is blocked or not.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activeAcl');
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

    /**
     * Get the email view for the mailing module.
     *
     * @param  int, $id, the user id in the data table.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mail($id)
    {
        $data['title'] = 'Mailing';
        $data['query'] = mailingUsers::find($id);

        return view('backend.mailing.mail', $data);
    }

    /**
     * Get mail group - VIEW
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mailGroupView()
    {
        $data['title'] = 'Groeps mail';
        $data['query'] = mailingUsers::all();

        return view('backend.mailing.group', $data);
    }

    /**
     * Mail all the user off the selected group.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mailGroup()
    {
        // TODO: implement mailing logic
        // TODO: Add return method.
        
        session()->class('class', 'alert-success');
        session()->class('message', trans('flashSession.mailingGroup'));
    }

    /**
     * Mail the users.
     *
     * @param  Requests\mailingValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Requests\mailingValidator $input)
    {
        // TODO: Implement mailing logic.

        session()->flash('class', 'alert-success');
        session()->flash('message', trans('flashSession.mailingStore'));

        return redirect()->back(302);
    }

    /**
     * Display the form for inserting a new user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert()
    {
        $data['title'] = 'Mailing';
        return view('backend.mailing.insert', $data);
    }

    /**
     * Store a new user into the data table.
     *
     * @param  Requests\mailingValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\mailingValidator $input)
    {
        // TODO: Implement notification.
        mailingUsers::create($input->except('_token'));

        session()->flash('class', 'alert-success');
        session()->flash('message', trans('flashSession.mailingStore'));

        return redirect()->back(302);
    }

    /**
     * Edit a user into the data table.
     *
     * @param  int, $id, the id of the user in the data table.
     * @param  Requests\mailingValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id, Requests\mailingValidator $input)
    {
        // TODO: Implement notification.

        mailingUsers::find($id)->update($input->except('_token'));
        
        session()->flash('class', 'alert-success');
        session()->flash('message', trans('flashSession.mailingEdit'));

        return redirect('mailing', 302);
    }

    /**
     * Show the update form off the mailing module.
     *
     * @param  int, $id, the user his id in the data table.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        $data['title']    = 'mailing';
        $data['database'] = mailingUsers::where('id', $id)->get();

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
        // TODO: implement notification.

        mailingUsers::find($id)->tag()->sync([]);
        mailingUsers::destroy($id);

        session()->flash('class', 'alert-success');
        session()->flash('message', trans('flashSession.mailingDelete'));

        return redirect()->back(302);
    }
}
