<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_skill')->insert([
        [
            'skill_id' =>1,
            'project_id' =>1
        ],
        [
            'skill_id' =>2,
            'project_id' =>1
        ],
        [
            'skill_id' =>1,
            'project_id' =>2
        ],
        [
            'skill_id' =>1,
            'project_id' =>3
        ],
        [
            'skill_id' =>4,
            'project_id' =>3
        ],
        [
            'skill_id' =>3,
            'project_id' =>4
        ]
       ] );
    }
}
