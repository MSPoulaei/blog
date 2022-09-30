<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view("auth.login",["title"=>"Login"]);
    }
    public function login()
    {
        $attributes=request()->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);

        if(!auth()->attempt($attributes)){
            throw ValidationException::withMessages(["email"=>"Your email or password are wrong!"]);
        }

        session()->regenerate();

        return redirect("/")->with("success","You have successfully logged in!");
    }

    public function registerForm()
    {
        return view("auth.register",["title"=>"Register"]);
    }
    public function register()
    {
        $attributes=request()->validate([
            "name"=>"required|min:3|max:255",
            "username"=>"required|unique:users,username|min:3|max:255",
            "email"=>"required|email|unique:users,email|max:255",
            "password"=>"required|min:7|max:255",
            "confirmPassword"=>"required|same:password",
        ]);

        $user=User::create($attributes);

        auth()->login($user);

        return redirect("/")->with("success","You have successfully registered!");
    }

    public function logout()
    {
        auth()->logout();
        return redirect("/")->with("success","You have successfully Logged out!");
    }
}
