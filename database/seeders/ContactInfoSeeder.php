<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactInfos= [
            [
                'title'=>'phone'
            ],
            [
                'title'=>'email'
            ],
            [
                'title'=>'social_media'
            ],
            [
                'title'=>'git'
            ],
            ];
            foreach ($contactInfos as $key => $value) {
                ContactInfo::create($value);
           } 
    }
}
