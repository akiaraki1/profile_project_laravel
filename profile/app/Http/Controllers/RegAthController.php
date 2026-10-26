<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegAthModel;
use Illuminate\Support\Facades\Hash;

class RegAthController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function reg()
    {
        return view('reg');
    }
    public function regProcess(Request $request)
    {
        $validated = $request->validate([
        'login' => 'required|string|min:8|unique:users,login',
        'email' => 'required|email|min:6|unique:users,email',
        'password' => 'required|min:8|confirmed', // confirmed сверяет с password_confirmation
    ], [
        'login.required' => 'Логин обязателен для заполнения',
        'login.min' => 'Логин должен быть минимум 8 символов',
        'login.unique' => 'Этот логин уже занят',
        'email.required' => 'Email обязателен для заполнения',
        'email.unique' => 'Этот email уже зарегистрирован',
        'password.min' => 'Пароль должен быть минимум 8 символов',
        'password.confirmed' => 'Пароли не совпадают',
    ]);

        $user = RegAthModel::create([
            'login' => $validated['login'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        session(['user_id' => $user->id]);

        return redirect()->route('profile');
    }

    public function aut()
    {
        return view('aut');
    }

    public function autProcess(Request $request)
    {
        $validated = $request->validate([
        'login' => 'required|string',
        'password' => 'required',
    ], [
        'login.required' => 'Введите логин',
        'password.required' => 'Введите пароль',
    ]);

        $user = RegAthModel::where('login', $validated['login'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return back()->withErrors([
                'login' => 'Неверный логин, почта или пароль',
            ])->onlyInput('login');
        }

        session(['user_id' => $user->id]);

        return redirect()->route('profile');
    }

    public function profile()
    {
        if (!session('user_id')) {
            return redirect('/');
        }

        return view('profile');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        $request->session()->regenerate(); // пересоздаёт ID сессии (защита от session fixation)

        return redirect()->route('index');
    }
}
