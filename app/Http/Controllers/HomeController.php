<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // \Carbon::parse('2019-03-01')->formatLocalized('d F Y');
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.home');
        }elseif (auth()->user()->role == 'operator') {
            return view('home');
        }else{
            return redirect()->route('landingpage');
        }
    }
    
}
