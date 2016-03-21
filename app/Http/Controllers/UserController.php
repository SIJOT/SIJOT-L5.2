<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidator;
use Bouncer;
use App\User;
use App\Http\Requests;

class UserController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Get an overview off the controller.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['users'] = User::paginate(15);

        return view('backend.users.overview', $data);
    }

    /**
     * Block a user.
     *
     * @param int, $id, the user id in the database
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function block($id)
    {
        $user = User::find($id);
        Bouncer::retract('active')->from($user);
        Bouncer::assign('blocked')->to($user);

        session()->flash('', '');
        return redirect()->back(302);
    }

    /**
     * Unblock a user.
     *
     * @param int, $id, the user id in the database
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unblock($id)
    {
        $user = User::find($id);
        Bouncer::retract('blocked')->from($user);
        Bouncer::assign('active')->to($user);

        session()-flash('', '');
        return redirect()->back(302);
    }

    public function insert()
    {
        return view('backend.users.insert');
    }

    /**
     * Insert a new user.
     *
     * @param UserValidator $input
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserValidator $input)
    {
        // TODO: check possibility for mass assign.
        $new = new User();
        $new->name = $input->name;
        $new->gsm = $input->gsm;
        $new->email = $input->email;
        $new->save();

        // Latest inserted id.
        $id = $new->id;

        $user = User::find($id);
        Bouncer::assign('active')->to($user);

        session()->flash('message', 'U hebt een gebruiker toegevoegd.');

        return redirect()->back(302);
    }

    /**
     * Destroy a user.
     *
     * @param int, $id, The user id in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Unset all the roles.
        $user = User::find($id);
        $user->roles()->sync([]);

        // Delete account
        User::destroy($id);
        session()->flash('message', 'U hebt een gebruiker verwijderd');

        return redirect()->back(302);
    }
}
