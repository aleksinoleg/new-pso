<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function customer_logout(){
        session()->forget('customer');
        return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('page');
    }

    public function toHomePage(){
        return redirect()->route('page');
    }

    public function admin(){
        return redirect()->route('admin',['method'=>'index','lang'=>env('DEFAULT_LANG')]);
    }
}
