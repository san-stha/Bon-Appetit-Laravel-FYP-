<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('user')){
            return view('userdash');
        } elseif(Auth::user()->hasRole('restaurant')){
            // return view('restaurantdash');
            return view('dashboard.restaurant.home');
        }elseif(Auth::user()->hasRole('admin')){
            return view('dashboard.admin.home');
        }
    }
}
