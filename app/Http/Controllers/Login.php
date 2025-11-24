<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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
            $user = Auth::user();
            return view("$locale.profile", compact("user"));
        }
        return redirect("$locale/login");
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
                $user = Auth::user();
                return view("$locale.profile", compact("user"));
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

    public function put($locale, Request $request) {
        try {
            $validated = $request->validate([
                "password" => "required|string|min:8",
                "confirm-password" => "required|string|min:8"
            ]);

            if($request->password != $request->input('confirm-password')){
                throw ValidationException::withMessages(['PasswordError' => 'PasswordError']);
            }

            $userId = Auth::id();
            $user = User::findOrFail($userId);

            $user->fill([
                "password" => Hash::make($request->password)
            ]);
            $user->save();
            $success = 1;
            return view("$locale.profile", compact("user", "success"));
        }
        catch (GlobalThrowable $error) {
            $user = Auth::user();
            $passwords = [$request->password, $request->input('confirm-password')];
            return view("$locale.profile", compact("user", "passwords", "error"));
        }
    }
}
