<?php

namespace App\Http\Controllers;

use App\Mail\RequestAccess as MailRequestAccess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Throwable as GlobalThrowable;

class RequestAccess extends Controller
{
    public function show($locale)
    {
        return view("$locale.requestaccess");
    }

    public function create($locale, Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "email" => "required|email",
        ]);
        $users = User::whereLike('role', '%admin%')->get();
        $root = $request->root();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new MailRequestAccess($request->name, $request->email, $root));
        }
        return redirect("$locale");
    }
}
