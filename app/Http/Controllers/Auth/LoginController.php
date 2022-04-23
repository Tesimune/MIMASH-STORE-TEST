<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {
        return inertia('Auth/Login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        $user = \App\Models\User::firstWhere('email', $validated['email']);

        if (!$user) return back()->withErrors([
               'email' => 'Incorrect email supplied',
            ]);
        
        if (Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Incorrect Password Provided',
        ]);
    }
}
