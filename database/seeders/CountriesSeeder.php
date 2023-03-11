<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Countries;
use Illuminate\Support\Facades\Storage;
use File;


class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //   $publicFiles = File::allFiles(public_path());
    //   foreach ($file as $publicFiles) {
    //     if()
    //     Storage::copy(from_path, to_path);
    //   }

      $files = File::allFiles(public_path() . "/assets/json");

    //   $files = Storage::disk('public\assets\json')->allFiles();

      foreach ($files as $file) {
        //   $path = Storage::disk('jsonContent')->get($file);
          $items = json_decode(file_get_contents($file));

          foreach ($items as $item) {
            foreach ($item->countries as $value) {
               if (isset($value->name)){
                  Countries::create([
                     'lang' => $item->lang,
                     'name' => $value->name,
                     'code_1' => $value->code_1,
                     'code_2'=> $value->code_2,
                     'code_3' => $value->code_3
                  ]);
               }
            }
          }
      }
    }
}
