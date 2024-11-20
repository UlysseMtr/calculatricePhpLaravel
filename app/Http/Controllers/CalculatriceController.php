<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatriceController extends Controller
{
    public function index()
    {
        return view('calculatrice');
    }

    public function calcul(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $operateur = $request->input('operande');

        switch ($operateur) {
            case '+':
                $resultat = $num1 + $num2;
                break;
            case '-':
                $resultat = $num1 - $num2;
                break;
            case '*':
                $resultat = $num1 * $num2;
                break;
            case '/':
                $resultat = $num1 / $num2;
                break;
            default:
                $resultat = 'Opérateur non valide';
        }

        return view('calculatrice', ['resultat' => $resultat, 'num1' => $num1, 'num2' => $num2, 'operateur' => $operateur]);
    }

}
