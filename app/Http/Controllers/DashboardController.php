<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    
    public function index(Request $request)
    {
        if (Auth::user()->status == 'active') {
            $data['user'] = Auth::guard('web')->user();
            return view('dashboard', $data);
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('login')
            ->withErrors('Maaf akun anda belum aktif');
        }
        
    }
}
