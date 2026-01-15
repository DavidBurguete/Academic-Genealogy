<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;

class Search extends Controller
{
    public function index($locale, Request $request)
    {
        $search_words = preg_split('/\s+/', trim($request->search));
        $doctors = Doctors::query();
        foreach ($search_words as $search_word) {
            $doctors->whereAny(['name', 'surname1', 'surname2', 'thesistitle'], 'like', "%{$search_word}%");
        }
        $pages = ceil($doctors->count() / 10);
        if ($request->has('faculty')) {
            $faculty = $request->get('faculty') == "unknown" ? '' : $request->get('faculty');
            $pages = $faculty == '' ? ceil(Doctors::whereNull('faculty')->count() / 10) : ceil(Doctors::where('faculty', '=', $faculty)->count() / 10);
            $doctors = $faculty == '' ? $doctors->whereNull('faculty') : $doctors->where('faculty', '=', $faculty);
        }

        $page = $request["page"];
        $page = ($page <= 0 || $page > $pages) ?: $page;
        if ($request->has('name')) {
            if ($request->get('name') == "descendent") {
                $doctors = $doctors->orderByDesc('name');
            } else if ($request->get('name') == "ascendent") {
                $doctors = $doctors->orderBy('name');
            }
        }
        if ($request->has('thesis')) {
            if ($request->get('thesis') == "descendent") {
                $doctors = $doctors->orderByDesc('thesistitle');
            } else if ($request->get('thesis') == "ascendent") {
                $doctors = $doctors->orderBy('thesistitle');
            }
        }
        if ($request->has('date')) {
            if ($request->get('date') == "descendent") {
                $doctors = $doctors->orderByDesc('defensedate');
            } else if ($request->get('date') == "ascendent") {
                $doctors = $doctors->orderBy('defensedate');
            }
        }
        $doctors = $doctors->skip(($page - 1) * 10)
            ->take(10)
            ->get();
        return view("$locale.list", compact('doctors', 'page', 'pages'));
    }
}
