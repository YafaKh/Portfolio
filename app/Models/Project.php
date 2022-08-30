<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skill;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','link','screenshot','visibility'];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
