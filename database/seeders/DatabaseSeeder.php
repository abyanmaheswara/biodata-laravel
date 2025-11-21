<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil Seeder Biodata kamu disini
        $this->call([
            PersonalDataSeeder::class,
        ]);
    }
}