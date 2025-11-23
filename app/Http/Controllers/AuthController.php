<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function auth(AuthRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt(["email" => $validated['email'], "password" => $validated['password']])) {
            $request->session()->regenerate();
            return redirect()->intended("/dashboard");
        } else {
            return back()->withErrors(["loginFailed" => "Wrong email or password"]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function registerProcess(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::where("email", $validated["email"])->first();
        if(!$user) {
            if($validated["password"] == $validated["confirmPassword"]) {
                $user = User::create($validated);
                Auth::login($user);
                return redirect("dashboard");
            } else {
                return back()->withErrors(["confirmPassword" => "Password does not match"])->withInput();
            }
        } else {
            return back()->withErrors(["email" => "Email already in use"])->withInput();
        }
    }
}
