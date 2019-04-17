<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestControll extends Controller
{
    public function login()
    {
        return view('app.auth.login');
    }

    public function register()
    {
        return view('app.auth.register');
    }

    public function verify()
    {
        return view('app.auth.verify');
    }

    public function email()
    {
        return view('app.auth.email');
    }

    public function reset()
    {
        return view('app.auth.reset');
    }
}
