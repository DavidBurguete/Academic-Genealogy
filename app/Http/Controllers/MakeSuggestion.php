<?php

namespace App\Http\Controllers;

use App\Mail\MakeSuggestion as MailMakeSuggestion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MakeSuggestion extends Controller
{
    public function index(Request $request) {
        $validated = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "subject" => "required",
            "message" => "required",
        ]);
        $users = User::get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new MailMakeSuggestion($request->name, $request->email, $request->subject, $request->message));
        }
        return redirect()->back();
    }
}
