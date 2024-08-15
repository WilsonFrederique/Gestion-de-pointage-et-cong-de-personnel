<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthentificationController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function verification(LoginFormRequest $request) {
        $requet = $request->validated();
        if(Auth::attempt($requet)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.employes.index'));
        }

        return back();
    }

    public function logout() {
        Auth::logout();

        return to_route('auth.login');
    }
}
