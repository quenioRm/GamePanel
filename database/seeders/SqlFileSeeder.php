<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SqlFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $files = Storage::disk('sql')->allFiles();

        foreach ($files as $file) {
            $path = Storage::disk('sql')->get($file);
            $sql = file_get_contents($path);
            DB::unprepared($sql);
        }

    }
}
