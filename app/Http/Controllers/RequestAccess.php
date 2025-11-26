<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable as GlobalThrowable;

class RequestAccess extends Controller
{
    public function show($locale)
    {
        return view("$locale.requestaccess");
    }

    // public function store($locale, Request $request)
    // {
    //     try {
    //         $validated = $request->validate([
    //             "name" => "required|string",
    //             "email" => "required|email",
    //         ]);
    //     } catch (GlobalThrowable $error) {
    //         return view("$locale.requestaccess", compact("error"));
    //     }
    //     $user = [
    //         "name" => $request->name,
    //         "email" => $request->email,
    //         "password" => Hash::make("AkademiskSlaktforskning"),
    //         "role" => "super-admin",
    //     ];
    //     User::create($user);
    //     return view("$locale.requestaccess", compact("user"));
    // }
}
