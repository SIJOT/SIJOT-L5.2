<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rental;
use App\User;

/**
 * Class HomeController
 * @package app\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.`
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index']]);
        $this->middleware('activeAcl', ['only' => 'index']);
    }

    /**
     * Get the index page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function front()
    {
        $data['title'] = 'Index';
        return view('front-end.home', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['users'] = User::count();
        return view('home', $data);
    }
}
