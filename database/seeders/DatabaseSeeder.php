<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call([
            AcademySeeder::class,   // luego academies
            CourseSeeder::class,    // luego courses (usa academy_id)
            StudentSeeder::class,   // students (independiente)
            // y por último course_student (usa course_id y student_id)
            CourseStudentSeeder::class,
        ]);
    }
}
