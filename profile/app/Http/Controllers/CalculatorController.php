<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index(Request $request)
    {   
        if (!session('user_id')) {
            return redirect('/');
        }

        $result = null;

        if ($request->filled(['num1', 'num2', 'operation'])) {
            $num1 = $request->input('num1');
            $num2 = $request->input('num2');

            if (is_numeric($num1) && is_numeric($num2)) {
                $result = match ($request->input('operation')) {
                    '+'  => $num1 + $num2,
                    '-'  => $num1 - $num2,
                    '*'  => $num1 * $num2,
                    '/'  => $num2 == 0 ? 0 : $num1 / $num2,
                    '%'  => $num2 == 0 ? 0 : $num1 % $num2,
                    '**' => $num1 ** $num2,
                    default => 'Неизвестная операция',
                };
            } else {
                $result = 'Вы ввели не число';
            }
        }

        return view('calculator', compact('result'));
    }
}
