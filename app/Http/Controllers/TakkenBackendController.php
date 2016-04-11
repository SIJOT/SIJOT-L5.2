<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
     * @param Requests\GroupValidator $request
     * @return mixed
     */
    public function update(Requests\GroupValidator $request)
    {
        return redirect()->back(302);
    }
}
