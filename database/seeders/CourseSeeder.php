<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('courses')->insert([ //Insertamos datos de prueba
        [
            'academy_id' => 1,
            'name' => 'Desarrollo Web con Laravel',
            'description' => 'APIs RESTful, Eloquent y autenticación con Sanctum.',
            'start_date' => '2026-10-01',
            'end_date' => '2027-03-15',
            'capacity' => 25,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'academy_id' => 1,
            'name' => 'Frontend con Vue y TypeScript',
            'description' => 'Componentes reactivos y consumo de APIs.',
            'start_date' => '2026-11-01',
            'end_date' => '2027-04-20',
            'capacity' => 20,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'academy_id' => 2,
            'name' => 'Inglés B2 Intensivo',
            'description' => 'Preparación oficial Cambridge B2.',
            'start_date' => '2026-10-15',
            'end_date' => '2027-02-28',
            'capacity' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}
