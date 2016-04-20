<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Fenos\Notifynder\Builder\NotifynderBuilder;
use Fenos\Notifynder\Facades\Notifynder;
use Silber\Bouncer\Database\Role;

/**
 * Class TakkenBackendController
 * @package App\Http\Controllers
 */
class TakkenBackendController extends Controller
{
    /**
     * TakkenBackendController constructor.
     *
     * The following middleware is defined here:
     * --
     * auth     = To see if the user is authencated.
     * activeAcl = to see if the user is blocked or not
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('activeAcl');
    }

    /**
     * Get the groups update view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view()
    {
        $data['kapoenen']   = Group::getGroup('kapoenen')->get();
        $data['welpen']     = Group::getGroup('welpen')->get();
        $data['jonggivers'] = Group::getGroup('jong-givers')->get();
        $data['givers']     = Group::getGroup('givers')->get();
        $data['jins']       = Group::getGroup('jins')->get();
        $data['leiding']    = Group::getGroup('leiding')->get();

        return view('backend.groups.update', $data);
    }

    /**
     * Update a group his description.
     *
     * @param  Requests\GroupValidator $request
     * @param  int, $id, the id in the mysql data table.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Requests\GroupValidator $request, $id)
    {
        Group::find($id)->update($request->except('_token'));

        // TODO: improve notification system.
        $users = Role::where('name', 'admin')
            ->orWhere('name', 'developer')
            ->orWhere('name', 'leiding')
            ->with('users')
            ->get();

        Notifynder::loop($users, function(NotifynderBuilder $builder, $user) {
            $builder->category('group.edit');
            $builder->from(auth()->user()->id);
            $builder->to($user->id);
            $builder->url(route('backend.groups.view'));
        })->send();

        session()->flash('class', 'alert-success');
        session()->flash('message', trans('flashSession.groupUpdate'));

        return redirect()->back(302);
    }
}
