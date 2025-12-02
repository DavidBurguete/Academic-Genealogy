<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;

class PhotosIntoDoctorsTableSeeder extends Seeder
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
            DB::table('doctors')->where('id', intval(substr($record['id'], 1, strlen($record['id']))))->update([
                'photo' => $record['photo'] ? intval(substr($record['id'], 1, strlen($record['id']))) . ".jpg" : null,
            ]);
        }
    }
}
