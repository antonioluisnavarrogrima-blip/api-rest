<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('students')->insert([
        [
            'name' => 'Laura',
            'surname' => 'García López',
            'email' => 'laura.garcia@example.com',
            'phone' => '600111222',
            'date_of_birth' => '2001-05-14',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Carlos',
            'surname' => 'Martínez Ruiz',
            'email' => 'carlos.martinez@example.com',
            'phone' => '600333444',
            'date_of_birth' => '1999-11-03',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Elena',
            'surname' => 'Sánchez Pérez',
            'email' => 'elena.sanchez@example.com',
            'phone' => '600555666',
            'date_of_birth' => '2003-02-22',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}
