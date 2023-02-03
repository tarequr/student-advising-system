<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMasterData extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'pre_name'];


    public function coursename()
    {
        return $this->belongsTo(Course::class, 'name', 'id');
    }
}
