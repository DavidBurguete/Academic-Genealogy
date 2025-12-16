<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;

class Search extends Controller
{
    public function index($locale, Request $request) {
        $doctors = Doctors::whereLike('name', "%" . $request->get('search') . "%")
                            ->orWhereLike('surname1', "%" . $request->get('search') . "%")
                            ->orWhereLike('surname2', "%" . $request->get('search') . "%")
                            ->orWhereLike('thesistitle', "%" . $request->get('search') . "%");
        $pages = ceil($doctors->count() / 10);
        $page = $request["page"];
        $page = ($page <= 0 || $page > $pages)?: $page;
        if($request->has('name')) {
            if($request->get('name') == "descendent"){
                $doctors = $doctors->orderByDesc('name');
            }
            else if($request->get('name') == "ascendent"){
                $doctors = $doctors->orderBy('name');
            }
        }
        if($request->has('thesis')) {
            if($request->get('thesis') == "descendent"){
                $doctors = $doctors->orderByDesc('thesistitle');
            }
            else if($request->get('thesis') == "ascendent"){
                $doctors = $doctors->orderBy('thesistitle');
            }
        }
        if($request->has('date')) {
            if($request->get('date') == "descendent"){
                $doctors = $doctors->orderByDesc('defensedate');
            }
            else if($request->get('date') == "ascendent"){
                $doctors = $doctors->orderBy('defensedate');
            }
        }
        $doctors = $doctors->skip(($page - 1) * 10)
                            ->take(10)
                            ->get();
        return view("$locale.list", compact('doctors', 'page', 'pages'));
    }
}
