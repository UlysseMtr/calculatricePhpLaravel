<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatriceController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function calculate(Request $request)
    {
        return view('calcul');
    }

}
