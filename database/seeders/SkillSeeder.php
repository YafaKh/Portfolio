<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills= [
            [
                'name'=>'bootstrap',
                'level'=>'beginner'
            ],
            [
                'name'=>'laravel',
                'level'=>'expert'
            ],
            [
                'name'=>'react',
                'level'=>'beginner'
            ],
            [
                'name'=>'node.js',
                'level'=>'expert'
            ]
            ];
            foreach ($skills as $key => $value) {
                Skill::create($value);
           } 
        
    }
}
