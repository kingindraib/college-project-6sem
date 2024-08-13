<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        // dd(true);
        // dd(complete_video());
        // return view('home.user.dashboard');
        return redirect()->route('home');
    }
}
