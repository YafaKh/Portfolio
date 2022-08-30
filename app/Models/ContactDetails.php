<?php

namespace App\Models;
use App\Models\ContactInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    use HasFactory;
    protected $table = 'contact_details';
    protected $fillable = ['contact_info_id','details','icon','visibility'];
    public function contact_info()
    {
        return $this->belongsTo(ContactInfo::class);
    }
}
