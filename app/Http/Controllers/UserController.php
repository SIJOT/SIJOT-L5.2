<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use Illuminate\Http\Request;

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
     * @param  int, $id, the user id in the database
     * @return \Illuminate\Http\RedirectResponse
     */
    public function block($id)
    {
        $user = User::find($id);
        Bouncer::retract('active')->from($user);
        Bouncer::assign('blocked')->to($user);

        return redirect()->back(302);
    }

    /**
     * Unblock a user.
     *
     * @param  int, $id, the user id in the database
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unblock($id)
    {
        $user = User::find($id);
        Bouncer::retract('blocked')->from($user);
        Bouncer::assign('active')->to($user);

        return redirect()->back(302);
    }

    public function insertNewUser()
    {

    }

    public function destroy()
    {

    }
}
