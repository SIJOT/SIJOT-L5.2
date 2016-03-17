<?php

namespace App\Http\Controllers;

use App\Http\Requests\changeUserValidator;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

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
        $data['user'] = User::find(auth()->user()->id);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editGroups()
    {
        return redirect()->back(302);
    }
}
