<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;

class ListDoctors extends Controller
{
    public function index($locale, Request $request) {
        if($request->has('page')) {
            $pages = ceil(Doctors::count() / 10);
            $page = $request["page"];
            $page = ($page <= 0 || $page > $pages)?: $page;
            $doctors = Doctors::where('id', '>=', ($page - 1) * 10 + 1)->where('id', '<=', $page * 10)->get();
            return view("$locale.list", compact('doctors', 'page', 'pages'));
        }
        return redirect("$locale/list?page=1");
    }
}
