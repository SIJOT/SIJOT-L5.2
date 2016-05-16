<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Bouncer;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ChangeUserValidator;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;

/**
 * Class EditProfileController
 *
 * @package App\Http\Controllers
 * @author  Tim Joosten <Topairy@gmail.com>  
 */
class EditProfileController extends Controller
{
    /**
     * EditProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activeAcl');
    }

    /**
     * Edit view for the user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view()
    {
        $data['user']  = User::find(auth()->user()->id);
        $data['roles'] = Role::all();

        return view('backend.users.edit', $data);
    }

    /**
     * Update the user info.
     *
     * @param  ChangeUserValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editInfo(ChangeUserValidator $input)
    {
        // TODO: needs unit tested.
        // TODO: clean up insert and set the mass assign.
        $user        = User::find(auth()->user()->id);
        $user->name  = auth()->user()->name;
        $user->email = $input->email;
        $user->gsm   = $input->gsm;

        if (Input::file()) {

            $image = Input::file('image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('assets/img/profile/' . $filename);

            Image::make($image->getRealPath())->resize(160, 160)->save($path);
            $user->image = $filename;
        }

        if (isset($input->password)) {
            $user->password = bcrypt($input->password);
        }

        $user->save();

        session()->flash('message', trans('flashSession.changeProfileInfo'));
        return redirect()->back(302);
    }

    /**
     * Edit the user groups off the user.
     *
     * @param  int, $id, the userId from the user.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editGroups($id)
    {
        // TODO: needs unit tested.
        $user = User::find($id);
        $user->roles()->sync([]);

        foreach (Input::get('roles') as $role) {
            Bouncer::assign($role)->to($user);
        }

        return redirect()->back(302);
    }
}
