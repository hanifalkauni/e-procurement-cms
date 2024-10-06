<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function dashboard()
    {
        logger('masuk sini');
        return view('dashboard');
    }
}

