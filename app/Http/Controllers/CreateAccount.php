<?php

namespace App\Http\Controllers;

use App\Mail\NewUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Throwable as GlobalThrowable;

use function PHPUnit\Framework\returnArgument;

class CreateAccount extends Controller
{
    public function show($locale) {
        if(Auth::check()){
            $user = Auth::user();
            if(hasRoleAtLeast($user->role, "admin")) {
                return view("$locale.createaccount");
            }
            abort(403);
        }
        return redirect("$locale/login");
    }

    public function store($locale, Request $request) {
        try {
            $validated = $request->validate([
                "name" => "required|string|min:5",
                "email" => "required|email",
                "password" => "required|string|min:8",
                "role" => "required|in:admin,base,super-admin"
            ]);
        }
        catch (GlobalThrowable $error) {
            $inputs = $request->except("_token");
            return redirect("$locale/create-account")->withErrors($error->errors())->withInput($inputs);
        }
        $user = new User();
        $data = $request->except("_token");
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->role = $data['role'];
        User::create($user->toArray());
        Mail::to($data['email'])->send(new NewUserMail($user, $data['password']));
        $success = 1;
        return view("$locale.createaccount", compact("success"));
    }

    public function delete($locale) {
        $user = Auth::user();
        $user->delete();
        return redirect("$locale")->with("accountDeleted");
    }
}
