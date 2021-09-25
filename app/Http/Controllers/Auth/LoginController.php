<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => "email|required",
            "password" => "required"
        ]);

        $credentials = $request->only("email","password");

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->to("/");
        }
    }
}
