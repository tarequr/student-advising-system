<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id', 'id');
    }

    public function advisedcourses()
    {
        return $this->belongsTo(AdvisedCourse::class, 'id', 'course_id');
    }


    public function coursedatas()
    {
        return $this->belongsTo(CourseMasterData::class);
    }
}
