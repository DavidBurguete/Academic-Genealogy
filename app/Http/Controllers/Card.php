<?php

namespace App\Http\Controllers;

use App\Mail\CreatedCard;
use App\Mail\DeletedCard;
use App\Models\Doctors;
use App\Models\Relations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Card extends Controller
{
    public function show($locale, Request $request)
    {
        if ($request->has('id')) {
            $doctor = Doctors::where('id', $request["id"])->get();
            $doctor = sizeof($doctor) ? $doctor[0] : "redirect";
            if ($doctor === "redirect") {
                return redirect("$locale/card?id=1");
            } else {
                $directors = Doctors::join('relations', 'relations.directorID', '=', 'doctors.id')
                    ->where('relations.studentID', '=', $request['id'])
                    ->select('doctors.id', 'doctors.name', 'doctors.surname1', 'doctors.surname2', 'doctors.faculty', 'relations.relationtype')
                    ->get();
                $students = Doctors::join('relations', 'relations.studentID', '=', 'doctors.id')
                    ->where('relations.directorID', '=', $request['id'])
                    ->orderBy('doctors.defensedate')
                    ->select('doctors.id', 'doctors.name', 'doctors.surname1', 'doctors.surname2', 'doctors.faculty', 'doctors.defensedate', 'doctors.unknownexactdate')
                    ->get();
                $doctor['faculty'] = $doctor['faculty'] ?: 'unknown';
                return view("$locale.card", compact('doctor', 'directors', 'students'));
            }
        }
        return redirect("$locale/card?id=1");
    }

    public function create($locale)
    {
        if (Auth::check()) {
            $everyone = Doctors::orderBy('name')->get();
            return view("$locale.newcard", compact('everyone'));
        }
        return redirect()->back();
    }

    public function store($locale, Request $request)
    {
        $request->validate([
            "name" => "required",
            "surname1" => "required",
        ]);

        $data = $request->except("_token");
        $students = $request["students"];

        $data = array_filter(
            $data,
            function ($key) {
                if (strpos($key, "director") !== 0 && strpos($key, "relationtype") !== 0 && strpos($key, "student") !== 0) {
                    return true;
                }
                return false;
            },
            ARRAY_FILTER_USE_KEY
        );

        $relationtypes = $request["relationtypes"];
        $directors = $request["directors"];
        $fullDirectors = null;

        if (!is_null($directors) && !is_null($relationtypes)) {
            $directors = array_filter(
                $directors,
                function ($key) use ($directors, $relationtypes) {
                    if (!is_null($directors[$key]) && isset($relationtypes[$key])) {
                        return true;
                    }
                    return false;
                },
                ARRAY_FILTER_USE_KEY
            );
            $relationtypes = array_intersect_key($relationtypes, $directors);
            $fullDirectors = array_combine($directors, $relationtypes);
        }

        if (!is_null($students)) {
            $students = array_filter(
                $students,
                function ($key) use ($students) {
                    if (!is_null($students[$key])) {
                        return true;
                    }
                    return false;
                },
                ARRAY_FILTER_USE_KEY
            );
        }

        $newDoctorID = Doctors::insertGetId($data);

        if (!is_null($directors)) {
            foreach ($fullDirectors as $directorID => $relationtype) {
                Relations::insert([
                    "directorID" => $directorID,
                    "studentID" => $newDoctorID,
                    "relationtype" => $relationtype,
                ]);
            }
        }

        if (!is_null($students)) {
            foreach ($students as $studentsID) {
                Relations::insert([
                    "directorID" => $newDoctorID,
                    "studentID" => $studentsID,
                    "relationtype" => "D",
                ]);
            }
        }

        $users = User::whereLike('role', '%admin%')->get();
        $root = $request->root();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new CreatedCard($newDoctorID, $data, $fullDirectors, $students, $root));
        }

        return redirect("$locale/card?id=$newDoctorID");
    }

    public function destroy($locale, Request $request) {
        if (Auth::check() && $request->has('id')) {
            $doctor = Doctors::where('id', $request->get('id'))->first();
            $directors = Relations::where('studentID', $request->get('id'))->select('directorID', 'relationtype')->get();
            $students = Relations::where('directorID', $request->get('id'))->select('studentID')->get();

            $users = User::whereLike('role', '%admin%')->get();
            $root = $request->root();
            foreach ($users as $user) {
                Mail::to($user->email)->send(new DeletedCard($doctor, $directors, $students, $root));
            }

            Relations::where('directorID', $request->get('id'))->orWhere('studentID', $request->get('id'))->delete();
            Doctors::where('id', $request->get('id'))->delete();
            return redirect("$locale/list?page=1")->with("cardDeleted");
        }
        return redirect()->back();
    }
}
