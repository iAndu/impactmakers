<?php

use Illuminate\Database\Seeder;

use App\Photo;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
         factory(App\InstitutionType::class, 5)->create();
         factory(App\Institution::class, 10)->create();
         $min_id = (int)DB::table('institutions')->min('id');
         $max_id = (int)DB::table('institutions')->max('id');
         for($i = $min_id; $i <= $max_id; $i++)
         	$flight = App\Photo::create(['institution_id' => $i, 'path' => '/images/' . strval($i % 5 + 1) . '.jpg']);
    }
}
