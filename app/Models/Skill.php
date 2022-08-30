<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'level','visability'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
