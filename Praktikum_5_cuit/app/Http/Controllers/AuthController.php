<?php

namespace App\Http\Controllers;

Use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(request $request): RedirectResponse
    {
        User::create([
            'name' => $request->username, 
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect('/login');

    }

    public function login(Request $request): RedirectResponse
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $user = User::where(['email' => $request->email])->firts();
            Auth::login($user);
            return redirect('/');
        }

        return redirect('login')->with('error', 'Email/Password Salah');

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
