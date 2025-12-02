<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;

class RelationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = realpath('./AcademicGenealogy.csv');

        $csv = Reader::createFromPath($csvFile, 'r');
        $csv->setHeaderOffset(0);
        $csv->setDelimiter('!');

        $records = $csv->getRecords();

        foreach ($records as $record) {
            $directors = $record['director'] ? $record['director'] : null;
            if($directors){
                $directors = explode(',', $directors);
                foreach($directors as $director){
                    $student_number = intval(substr($record['id'], 1, strlen($record['id'])));
                    $director_number = intval(substr($director, 1, strlen($director)));
                    $type_letter = $director[0];
                    DB::table('relations')->insertOrIgnore([
                        'directorID'      => $director_number,
                        'studentID'       => $student_number,
                        'relationtype'    => $type_letter,
                    ]);
                }
            }
        }

        foreach ($records as $record) {
            $students = $record['students'] ? $record['students'] : null;
            if($students){
                $students = explode(',', $students);
                foreach($students as $student){
                    $director_number = intval(substr($record['id'], 1, strlen($record['id'])));
                    $student_number = intval(substr($student, 1, strlen($student)));
                    $type_letter = $student[0];
                    DB::table('relations')->insertOrIgnore([
                        'directorID'      => $director_number,
                        'studentID'       => $student_number,
                        'relationtype'    => $type_letter,
                    ]);
                }
            }
        }

    }
}
