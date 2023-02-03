<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function department()
    {
        return $this->belongsTo(Department::class,'dept_id','id');
    }

}
