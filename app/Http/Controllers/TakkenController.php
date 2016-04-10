<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class TakkenController extends Controller
{
    /**
     * Get an overview off all the groups.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function overview()
    {
        $data['all']        = Group::all();
        $data['kapoenen']   = Group::getGroup('kapoenen')->get();
        $data['welpen']     = Group::getGroup('welpen')->get();
        $data['jongGivers'] = Group::getGroup('jonggivers')->get();
        $data['givers']     = Group::getGroup('givers')->get();
        $data['jins']       = Group::getGroup('jins')->get();
        $data['leiding']    = Group::getGroup('leiding')->get();

        return view('front-end.takken', $data);
    }

    /**
     * Get a specific group.
     *
     * @param  string, $tak, The URI segment off the group.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function group($tak)
    {
        $data['group'] = Group::getGroup($tak)->get();
        return view('front-end.group', $data);
    }
}
