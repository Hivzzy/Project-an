<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function home()
    {
        return view("home");
    }
    function partial()
    {
        return view("/partials/sidebar");
    }
}
