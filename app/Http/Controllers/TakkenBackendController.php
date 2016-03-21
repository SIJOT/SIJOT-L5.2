<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TakkenBackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

        return view('backend.groups.update', $data);
    }

    public function update()
    {

    }
}
