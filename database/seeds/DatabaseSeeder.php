<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MajorTableSeeder::class);
        // $this->call(SubjectTableSeeder::class);
        $this->call(UniversityTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(LecturerTableSeeder::class);
        $this->call(RoleTableSeeder::class);
    }
}
