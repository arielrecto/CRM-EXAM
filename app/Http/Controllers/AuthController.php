<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function store(LoginRequest $request)
    {

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return back()->with(['message_error' => 'Incorrect Credentials']);
        }


        $request->session()->regenerate();

        return to_route('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();


        return to_route('login');
    }
}
