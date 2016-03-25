<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidator;
use Bouncer;
use App\User;
use App\Http\Requests;

class UserController extends Controller
{
    /**
     * UserController constructor.
     *
     * TODO: set activeAcl middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
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

        session()->flash('message', trans('flashSession.userBlock'));

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

        session()-flash('message', trans('flashSession.userUnblock'));

        return redirect()->back(302);
    }

    public function insert()
    {
        return view('backend.users.insert');
    }

    /**
     * Insert a new user.
     *
     * @param  UserValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserValidator $input)
    {
        // TODO: #13 Add mailing logic when a new user is registrated
        
        $new           = new User();
        $new->name     = $input->name;
        $new->gsm      = $input->gsm;
        $new->email    = $input->email;
        $new->password = bcrypt(str_random(20));
        $new->save();

        // Latest inserted id.
        $id = $new->id;

        $user = User::find($id);
        Bouncer::assign('active')->to($user);

        session()->flash('message', trans('flashSession.userAdd'));

        return redirect()->back(302);
    }

    /**
     * Destroy a user.
     *
     * @param  int, $id, The user id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Destroy the user.
        User::find($id)->roles()->sync([]);
        User::destroy($id);

        session()->flash('message', trans('flashSession.userDelete'));

        return redirect()->back(302);
    }
}
