<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects= [
            [
                'title'=>'restaurant',
                'description'=>'restaurant management system',
                'link'=>'#',
                'screenshot'=>'proj1.jpeg',
                'visibility'=>1,
            ],
            [
                'title'=>'E-commarce',
                'description'=>'the diana super market website, where we display all available items, and give the maneger the ability of controlling them easily',
                'link'=>'#',
                'screenshot'=>'diana.jpg',
                'visibility'=>1,
            ],
            [
                'title'=>'salah pharmacy',
                'description'=>'A pharmacy wibsitem, allow customers to do there orderds and payments using it',
                'link'=>'#',
                'screenshot'=>'pharmacy.jpg',
                'visibility'=>0,
            ],
            [
                'title'=>'portfolio',
                'description'=>'A portfolio for a Professional photographer "mohammad ahmad"',
                'link'=>'#',
                'screenshot'=>'mohammad.jpg',
                'visibility'=>1,
            ],
            ];
            foreach ($projects as $key => $value) {
                Project::create($value);
           } 
    }
}
