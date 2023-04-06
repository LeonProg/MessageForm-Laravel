<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == 2) {
            return view('admin');
        }

        return view('home');
    }

    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }
}
