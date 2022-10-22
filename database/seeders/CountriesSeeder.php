<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Countries;
use Illuminate\Support\Facades\Storage;


class CountriesSeeder extends Seeder
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
          $items = json_decode($path);

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
