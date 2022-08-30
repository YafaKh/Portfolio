<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(SkillSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectSkillSeeder::class);
        $this->call(ContactInfoSeeder::class);
        $this->call(ContactDetailSeeder::class);
    }
}
