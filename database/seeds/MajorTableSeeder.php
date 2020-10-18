<?php

use Illuminate\Database\Seeder;

class MajorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Major::class, 5)->create()->each(function ($major) {
          // Seed the relation with 3 subcategories
          $subjects = factory(App\Subject::class, 3)->make();
          $major->subjects()->saveMany($subjects);
      });
    	
        
    }
}