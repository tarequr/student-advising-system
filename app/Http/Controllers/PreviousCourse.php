<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Advised;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PreviousCourse extends Controller
{
    public function index()
    {
        Gate::authorize('previousCourses.index');

        $courses = Advised::with(['user','advisedCourses','advisedCourses.course'])->get();
        // dd($courses);

        return view('backEnd.course.previouscourse',compact('courses'));
    }
}
