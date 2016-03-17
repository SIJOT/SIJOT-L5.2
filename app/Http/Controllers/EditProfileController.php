<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Bouncer;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\changeUserValidator;

class EditProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Edit view for the user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view()
    {
        $data['user']      = User::find(auth()->user()->id);
        $data['roles']     = Role::all();

        return view('backend.users.edit', $data);
    }

    /**
     * Update the user info.
     *
     * @param  changeUserValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editInfo(changeUserValidator $input)
    {
        $user        = User::find(auth()->user()->id);
        $user->name  = auth()->user()->name;
        $user->email = $input->email;
        $user->gsm   = $input->gsm;

        if (isset($input->password)) {
            $user->password = bcrypt($input->password);
        }

        $user->save();

        session()->flash('message', 'U hebt successvol uw gegevens aangepast');
        return redirect()->back(302);
    }

    /**
     * Edit the user groups off the user.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editGroups($id)
    {
        $user = User::find($id);
        $user->roles()->sync([]);

        foreach(Input::get('roles') as $role) {
            Bouncer::assign($role)->to($user);
        }

        return redirect()->back(302);
    }
}
