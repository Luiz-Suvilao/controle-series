<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('login.index');
    }

    public function login(Request $request): RedirectResponse
    {
        if(!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors(['Usuário ou senha inválido']);
        }

        return to_route('series.index');
    }

    public function logOut(): RedirectResponse
    {
        Auth::logout();

        return to_route('login');
    }
}
