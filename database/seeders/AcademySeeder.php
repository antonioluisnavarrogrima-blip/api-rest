<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('academies')->insert([
            [
                'user_id' => 1,
                'name' => 'Academia Central',
                'description' => 'Centro de formación tecnológica y programación.',
                'address' => 'Calle Mayor 12, Almería',
                'phone' => '950123456',
                'email' => 'info@academiacentral.es',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Academia Norte',
                'description' => 'Especializada en idiomas y certificaciones.',
                'address' => 'Av. del Mediterráneo 45, Almería',
                'phone' => '950654321',
                'email' => 'contacto@academianorte.es',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
