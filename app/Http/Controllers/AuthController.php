<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email|',
                'password' => 'required|min:8|max:32|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ],
            [
                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'O campo email deve ser um email válido.',

                'password.required' => 'O campo senha é obrigatório',
                'password.min' => 'A senha deve conter no mínimo :min caracteres',
                'password.max' => 'A senha deve conter no máximo :max caracteres',
                'password.regex' => 'A senha deve conter uma letra minúscula uma maiúscula e um número.'
            ]
        );

        $user = User::where('email', $credentials['email'])
            ->where('active', true)
            ->where(function ($query) {
                $query->whereNull('blocked_until')
                    ->orWhere('blocked_until', '<=', now());
            })
            ->whereNotNull('email_verified_at')
            ->whereNull('deleted_at')
            ->first();

        if ( ! $user) {
            return back()->withInput()->with(['invalid_login' => 'Username e/ou senha incorreto.']);
        }

        if ( ! password_verify($credentials['password'], $user->password)) {
            return back()->withInput()->with(['invalid_login' => 'Username e/ou senha incorreto.']);
        }

        $user->last_login = now();
        $user->blocked_until = null;
        $user->save();

        $request->session()->regenerate();
        Auth::login($user);

        return redirect()->intended(route('home'));
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function store_user(): View
    {
        return view('auth.store_user');
    }
}
