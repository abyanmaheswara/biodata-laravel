<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonalData; // Panggil Model

class PersonalDataSeeder extends Seeder
{
    public function run(): void
    {
        PersonalData::create([
            'name'        => 'John Doe',
            'title'       => 'Senior Software Engineer',
            'email'       => 'john.doe@example.com',
            'phone'       => '+1 (555) 123-4567',
            'address'     => '123 Main Street, New York, NY 10001',
            'birth_date'  => 'January 15, 1990',
            'nationality' => 'American',
            'linkedin'    => 'linkedin.com/in/johndoe',
            'github'      => 'github.com/johndoe',
            'summary'     => 'Passionate software engineer...',
            // Data Array (JSON)
            'skills'      => ['Laravel', 'PHP', 'JavaScript', 'Vue.js', 'MySQL'],
            'experience'  => [
                ['position' => 'Senior Web Dev', 'company' => 'Tech Solutions', 'period' => '2022-Present', 'description' => 'Lead Developer'],
            ],
            'education'   => [
                ['degree' => 'Bachelor CS', 'institution' => 'Univ Tech', 'period' => '2014-2018', 'description' => 'Graduated with honors'],
            ]
        ]);
    }
}