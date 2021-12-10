<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;
use function back;
use function redirect;

class LoginController
{
    public function create() : Response
    {
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();
        if (isset($user)
            && Hash::check(
                $credentials['password'],
                $user->password
            )
        ) {
            auth()->login($user);
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }



    public function register() : Response
    {
        return Inertia::render('Auth/Register');
    }

    public function signup(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'name' => ['string', 'required', 'max:255', 'min:5'],
            'email' => ['email', 'required', 'max:255', Rule::unique('users','email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $credentials['password'] = Hash::make($credentials['password']);
        $user = User::create($credentials);

        Auth::login($user);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
