<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Relations;
use Illuminate\Http\Request;

class Card extends Controller
{
    public function show($locale, Request $request) {
        if($request->has('id')) {
            $doctor = Doctors::where('id', $request["id"])->get();
            $doctor = sizeof($doctor) ? $doctor[0] : "redirect";
            if($doctor === "redirect") {
                return redirect("$locale/card?id=1");
            }
            else{
                $directors = Doctors::join('relations', 'relations.directorID', '=', 'doctors.id')
                                    ->where('relations.studentID', '=', $request['id'])
                                    ->select('doctors.id', 'doctors.name', 'doctors.surname1', 'doctors.surname2', 'doctors.faculty', 'relations.relationtype')
                                    ->get();
                $students = Doctors::join('relations', 'relations.studentID', '=', 'doctors.id')
                                    ->where('relations.directorID', '=', $request['id'])
                                    ->orderBy('doctors.defensedate')
                                    ->select('doctors.id', 'doctors.name', 'doctors.surname1', 'doctors.surname2', 'doctors.faculty', 'doctors.defensedate')
                                    ->get();
                $doctor['faculty'] = $doctor['faculty']?: 'unknown';
                return view("$locale.card", compact('doctor', 'directors', 'students'));
            }
        }
        return redirect("$locale/card?id=1");
    }
}
