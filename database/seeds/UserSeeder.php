<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Lecturer;
use App\Student;
use App\University;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 5)->create();
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'adminn@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $admin->assignRole('admin');

        $user1 = User::create([
        	'name' => 'Dr. Aye',
        	'email' => 'aye@gmail.com',
        	'password' => Hash::make('12345678'),
        ]);

        $user1->assignRole('lecturer');
        Lecturer::create([
            'bachelor' => 'Ph.D',
            'position' => 'Professor',
            'user_id' => $user1->id,
            'university_id' =>1

        ]);

        $user2 = User::create([
        	'name' => 'Yu',
        	'email' => 'yu@gmail.com',
        	'password' => Hash::make('123456789'),
        ]);
        $user2->assignRole('student');
        Student::create([
            'bachelor' => 'BC.Sc',
            'position' => 'Web Developer',
            'user_id' => $user2->id

        ]);
    }
}
