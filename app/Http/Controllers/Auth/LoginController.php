<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login()
    {
        try{
            return view('auth.login');
        } catch (\Exception $e) {
            Alert::toast('Erro ao carregar a página de login!', 'error');
            return redirect()->back();
        }
    }

    public function authenticate(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            Alert::toast('E-mail e/ou senha de usuário com dados incorretos', 'error');
            return redirect()->back();
        }
        return redirect()->route('dashboard');
    }
}
