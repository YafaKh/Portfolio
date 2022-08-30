<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactDetails;

class ContactDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactDetails=[
            [
                'contact_info_id' =>1,
                'details' =>'0569864676',
                'icon'=>'fa-solid fa-phone'
            ],
            [
                'contact_info_id' =>2,
                'details' =>'yafa"gmail.com',
                'icon'=>'fa-solid fa-envelope'

            ],
            [
                'contact_info_id' =>3,
                'details' =>'https://www.facebook.com/',
                'icon'=>'fa-brands fa-facebook-f'
            ],
            [
                'contact_info_id' =>3,
                'details' =>'https://www.linkedin.com/',
                'icon'=>'fa-brands fa-linkedin'
            ],
        ];
        foreach ($contactDetails as $key => $value) {
            ContactDetails::create($value);
       } 
    }
}
