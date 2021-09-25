<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "email|required",
            "password" => "required|confirmed",
            "password_confirmation" => "required"
        ]);

        $data = $request->only("name","email");
        $data["password"] = bcrypt($request->password);

        $user = User::create($data);
        Auth::login($user);

        return redirect()->to("/");
    }
}
