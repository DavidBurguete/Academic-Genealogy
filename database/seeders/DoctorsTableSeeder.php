<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;

class DoctorsTableSeeder extends Seeder
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
            DB::table('doctors')->insert([
                'name'            => $record['name']?: null,
                'surname1'        => $record['surname1']?: null,
                'surname2'        => $record['surname2']?: null,
                'thesistitle'     => $record['thesistitle']?: null,
                'defensedate'     => $record['defensedate']?: null,
                'unknownexactdate'=> $record['unknownexactdate']?: null,
                'faculty'         => $record['faculty']?: null,
                'city'            => $record['city']?: null,
                'university'      => $record['university']?: null,
                'birthdate'       => $record['birthdate']?: null,
                'deathdate'       => $record['deathdate']?: null,
                'teseoid'         => $record['teseoid']?: null,
            ]);
        }
    }
}
