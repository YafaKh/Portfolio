<?php

namespace App\Models;
use App\Models\ContactDetails;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;
    protected $table = 'contact_info';
    protected $fillable = ['title'];
    public function contact_details()
    {
        return $this->hasMany(ContactDetails::class);
    }
}
