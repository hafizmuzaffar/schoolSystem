<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\Course;
use App\Models\SchoolClass;
use App\Models\Student;
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
        // \App\Models\User::factory(10)->create();

        Course::create([
            'course_name' => 'Matematika'
        ]);
        Course::create([
            'course_name' => 'B.ind'
        ]);
        Course::create([
            'course_name' => 'B.ing'
        ]);
        SchoolClass::create([
            'class_name' => 'TKJ A'
        ]);
        SchoolClass::create([
            'class_name' => 'TKJ B'
        ]);
        Student::create([
            'student_number' => 'S0001',
            'name'           => 'Alfian',
            'address'        => 'Jogja',
            'email'          => 'alfian@gmail.com',
            'phone_number'   => '0827512912',
            'school_class_id' => 1
        ]);
        Teacher::create([
            'teacher_number' => 'T0001',
            'name'           => 'Guru Alfian',
            'address'        => 'Jogja',
            'email'          => 'alfian@gmail.com',
            'phone_number'   => '0827512912',
            'course_id' => 1
        ]);
        Teacher::create([
            'teacher_number' => 'T0002',
            'name'           => 'Guru Hartanto',
            'address'        => 'Jogja',
            'email'          => 'hartanto@gmail.com',
            'phone_number'   => '0827512911251',
            'course_id' => 1
        ]);
    }
}
