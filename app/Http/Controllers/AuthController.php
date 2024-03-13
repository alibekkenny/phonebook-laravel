<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function register(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3'
        ]);
        $user = User::create($data);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
