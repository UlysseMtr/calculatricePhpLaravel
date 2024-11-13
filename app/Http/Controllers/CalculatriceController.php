<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatriceController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function calcul(Request $request)
    {
        return view('calculatrice');
    }

}
