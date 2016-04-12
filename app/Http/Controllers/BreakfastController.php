<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BreakfastController extends Controller
{
    /**
     * Get the breakfast description.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = 'Het ontbijt';
        return view('front-end.ontbijt', $data);
    }
}
