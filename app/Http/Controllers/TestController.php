<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestConstroller extends Controller
{

    public function ping()
    {
        return view('welcome');
    }
}
