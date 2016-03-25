<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rental;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index']]);
    }

    public function front()
    {
        return view('front-end.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rentals'] = Rental::count();
        $data['users']   = User::count();

        return view('home', $data);
    }
}
