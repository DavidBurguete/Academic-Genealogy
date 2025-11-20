<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable as GlobalThrowable;

class Login extends Controller
{
    public function show($locale)
    {
        return view("$locale.login");
    }

    public function index($locale)
    {
        if(Auth::check()){
            return view("$locale.profile");
        }
        return view("$locale.login");
    }

    public function logout($locale, Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("$locale");
    }

    public function view($locale, Request $request)
    {
        try {
            $validated = $request->validate([
                "name" => "required|string",
                "password" => "required|string",
            ]);

            if (Auth::attempt($validated)) {
                return view("$locale.profile");
            } else {
                $user = User::where("name", $request->name)->get();
                if (sizeof($user) != 1) {
                    $error = "NameError";
                    return view("$locale.login", compact("request", "error"));
                } else if (!Hash::check($request->password, $user[0]->password)) {
                    $error = "PasswordError";
                    return view("$locale.login", compact("request", "error"));
                }
            }
        } catch (GlobalThrowable $error) {
            $error = "FieldError";
            return view("$locale.login", compact("request", "error"));
        }
    }
}
