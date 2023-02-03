<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisedCourse extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function advised()
    {
        return $this->belongsTo(AdvisedCourse::class,);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
