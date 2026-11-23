<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('course_student')->insert([
        [
            'course_id' => 1,
            'student_id' => 1,
            'enrolled_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'course_id' => 1,
            'student_id' => 2,
            'enrolled_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'course_id' => 2,
            'student_id' => 1,
            'enrolled_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'course_id' => 3,
            'student_id' => 3,
            'enrolled_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}
