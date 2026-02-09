<?php

namespace App\Http\Controllers;

use App\Mail\EditedCard;
use App\Models\Doctors;
use App\Models\Relations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class CardManipulation extends Controller
{
    public function show($locale, Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        if ($request->has('id')) {
            $doctor = Doctors::where('id', $request["id"])->get();
            $doctor = sizeof($doctor) ? $doctor[0] : "redirect";
            if ($doctor === "redirect") {
                return redirect("$locale/card?id=1");
            } else {
                $fullRelativeDirectors = !$doctor['defensedate'] ?
                    Doctors::select('id', 'name', 'surname1', 'surname2')->orderBy('name')->get() :
                    Doctors::where('defensedate', '<', $doctor['defensedate'])->orWhereNull('defensedate')->orderBy('name')->select('id', 'name', 'surname1', 'surname2')->get();
                $fullRelativeStudents = !$doctor['defensedate'] ?
                    Doctors::select('id', 'name', 'surname1', 'surname2')->orderBy('name')->get() :
                    Doctors::where('defensedate', '>', $doctor['defensedate'])->orWhereNull('defensedate')->orderBy('name')->select('id', 'name', 'surname1', 'surname2')->get();
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
                return view("$locale.cardmanipulation", compact('doctor', 'directors', 'students', 'fullRelativeDirectors', 'fullRelativeStudents'));
            }
        }
        return redirect()->back();
    }

    public function update($locale, Request $request)
    {
        $request->validate([
            "name" => "required",
            "surname1" => "required",
            "portrait" => Rule::dimensions()
                ->minWidth(250)
                ->maxWidth(250)
                ->minHeight(389)
                ->maxHeight(389),
        ]);
        $data = $request->except(["_token", "portrait", "portraitinputname"]);
        $doctor = Doctors::where('id', $data['id'])->get()[0];
        $previousDirectors = Relations::where('studentID', $data['id'])->select('directorID', 'relationtype')->get();
        $previousStudents = Relations::where('directorID', $data['id'])->select('studentID')->get();
        $differ = [];

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
        $directorsToAdd = [];
        $directorsToUpdate = [];
        $directorsToDelete = [];
        $previousDirectorsIDs = [];
        $madeChanges = false;

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
        foreach ($previousDirectors as $previousDirector) {
            if (!isset($fullDirectors[$previousDirector['directorID']])) {
                array_push($directorsToDelete, $previousDirector['directorID']);
            } else if ($fullDirectors[$previousDirector['directorID']] != $previousDirector['relationtype']) {
                $directorsToUpdate[$previousDirector['directorID']] = $fullDirectors[$previousDirector['directorID']];
            }
            array_push($previousDirectorsIDs, $previousDirector['directorID']);
        }
        if (!is_null($directors)) {
            $newDirectors = array_diff($directors, $previousDirectorsIDs);
            foreach ($newDirectors as $arrayID => $newDirector) {
                $directorsToAdd[$newDirector] = $relationtypes[$arrayID];
            }
        }

        $students = $request["students"];
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
            $studentsToAdd = array_diff($students, Arr::flatten($previousStudents->toArray()));
            $studentsToDelete = array_diff(Arr::flatten($previousStudents->toArray()), $students);
        } else {
            $studentsToAdd = [];
            $studentsToDelete = Arr::flatten($previousStudents->toArray());
        }

        foreach ($data as $key => $value) {
            if ($data[$key] != $doctor[$key]) {
                $differ[$key] = $value;
            }
        }

        $users = User::whereLike('role', '%admin%')->get();
        $root = $request->root();
        $updateDoctor = Doctors::where('id', $data['id']);
        $previousDoctor = $updateDoctor->first();

        if (sizeof($differ) > 0) {
            $updateDoctor->timestamps = false;
            foreach ($differ as $field => $value) {
                $updateDoctor->update([$field => $value]);
            }
            $madeChanges = true;
        }

        if (sizeof($directorsToUpdate) > 0) {
            foreach ($directorsToUpdate as $directorID => $relationtype) {
                Relations::where('directorID', $directorID)->where('studentID', $data['id'])->update(['relationtype' => $relationtype]);
            }
            $madeChanges = true;
        }

        if (sizeof($directorsToAdd) > 0) {
            foreach ($directorsToAdd as $directorID => $relationtype) {
                Relations::insert(['directorID' => $directorID, 'studentID' => $data['id'], 'relationtype' => $relationtype]);
            }
            $madeChanges = true;
        }

        if (sizeof($directorsToDelete) > 0) {
            foreach ($directorsToDelete as $directorID) {
                Relations::where('directorID', $directorID)->where('studentID', $data['id'])->delete();
            }
            $madeChanges = true;
        }

        if (sizeof($studentsToAdd) > 0) {
            foreach ($studentsToAdd as $studentID) {
                Relations::insert(['directorID' => $data['id'], 'studentID' => $studentID, 'relationtype' => "D"]);
            }
            $madeChanges = true;
        }

        if (sizeof($studentsToDelete) > 0) {
            foreach ($studentsToDelete as $studentID) {
                Relations::where('directorID', $data['id'])->where('studentID', $studentID)->delete();
            }
            $madeChanges = true;
        }

        if ($madeChanges) {
            foreach ($users as $user) {
                Mail::to($user->email)->send(new EditedCard($previousDoctor, $differ, $directorsToUpdate, $directorsToAdd, $directorsToDelete, $studentsToAdd, $studentsToDelete, $root));
            }
        }

        if (is_null($request->portraitinputname)) {
            unlink("portrait/" . $doctor->photo);
            Doctors::where('id', $doctor->id)->update(['photo' => null]);
        } else if ($request->portraitinputname != $doctor->photo) {
            $portrait = $request->file('portrait');
            $extension = explode(".", $portrait->getClientOriginalName());
            $fullname = $doctor->id . '_' . str_replace(' ', '%20', $doctor->name) . '_' . str_replace(' ', '%20', $doctor->surname1) . '.' . $extension[sizeof($extension) - 1];
            Doctors::where('id', $doctor->id)->update(['photo' => $fullname]);
            $request->file('portrait')->move('portrait', $fullname);
        }

        return redirect("$locale/card?id=" . $data['id'])->with('isChanged', $madeChanges);
    }
}
