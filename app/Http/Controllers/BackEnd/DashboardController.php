<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advised;
use App\Models\AdvisedCourse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        Gate::authorize('dashboard');

        $students = User::where('role_id',3)->orderBy('id','desc')->take(10)->get();

        return view('backEnd.dashboard',compact('students'));
    }

    public function mycourse()
    {
        Gate::authorize('mycourse');

        $mycourses = Advised::where('student_id', Auth::user()->id)->first();

        if (!empty($mycourses)) {
            $advisedcourses = AdvisedCourse::where('advised_id', $mycourses->id)->get();

            return view('backEnd.course.mycourse', compact('advisedcourses'));
        }

        return view('backEnd.course.mycourse');
    }
}
