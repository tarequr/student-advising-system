<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advised extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function advisedCourses()
    {
        return $this->hasMany(AdvisedCourse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }
}
