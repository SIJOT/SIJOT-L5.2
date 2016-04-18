<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

/**
 * Class TakkenController
 * @package App\Http\Controllers
 */
class TakkenController extends Controller
{
    /**
     * Get an overview off all the groups.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function overview()
    {
        $this->seoMeta(['Sint-Joris', 'Scouts', 'Turnhout'], 'Takken Overzicht');
        $this->seoFacebook('Takken', 'Takken overzicht');
        $this->seoTwitter('Takken', 'Takken overzicht');

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

        foreach ($data['group'] as $info) {
            $description = substr($info->description, 0, 125);

            $this->seoMeta(['scouts', 'sint-joris', $tak], $description);
            $this->seoTwitter($info->title, $description);
            $this->seoFacebook($info->title, $description);
        }

        return view('front-end.group', $data);
    }
}
