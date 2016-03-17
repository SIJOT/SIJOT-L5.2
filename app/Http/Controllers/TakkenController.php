<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data['kapoenen']   = '';
        $data['welpen']     = '';
        $data['jongGivers'] = '';

        return view('', $data);
    }
}
