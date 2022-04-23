<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function registerPage()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
           'name' => ['required', 'string', 'min:7'],
           'email' => ['required', 'email', 'unique:users'],
            'tel' => ['required', 'string', 'unique:users'],
            'address' => ['required', 'string', 'min:10'],
            'password' => ['required', 'string', 'confirmed', 'min:8']
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('login');
    }
}
