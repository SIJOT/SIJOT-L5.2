<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rental;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.`
     *
     * TODO: set activeAcl middleware.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index']]);
    }

    /**
     * Get the index page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function front()
    {
        return view('front-end.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['rentals'] = Rental::count();
        $data['users']   = User::count();

        return view('home', $data);
    }
}
