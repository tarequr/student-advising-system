<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Advised;
use Illuminate\Http\Request;
use App\Models\AdvisedCourse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class DropCourseController extends Controller
{

    public function myresult()
    {
       $id= Auth::user()->user_id;
       $myresult = Result::where('student_id',$id)->first();
      if($myresult){

          return  view('backEnd.result.myresult',compact('myresult'));
      }
    }


    public function index()
    {
       $advised_students = Advised::all();

        if(!empty($advised_students)){
            return view('backEnd.dropCourse.index',compact('advised_students'));
        }
      return view('backEnd.dropCourse.index');
    }

    public function show($id)
    {
        $mycourses = Advised::where('student_id',$id )->first();

        if (!empty($mycourses)) {
            $advisedcourses = AdvisedCourse::where('advised_id', $mycourses->id)->get();
            return view('backEnd.dropCourse.courseList',compact('advisedcourses'));
        }
    }

    public function destroy($id)
    {
        $advised_course = AdvisedCourse::findOrFail($id);
        $check_value    = AdvisedCourse::where('advised_id',$advised_course->advised_id)->get();

        try {
            if (!empty($advised_course)) {
                if (count($check_value) == 1) {
                    Advised::findOrFail($advised_course->advised_id)->delete();
                    $advised_course->delete();

                    notify()->success("Course Drop Successfully.", "Success");
                    return redirect()->route('student-list');
                }
                $advised_course->delete();
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Course Drop Failed.", "Error");
            return back();
        }

        notify()->success("Course Drop Successfully.", "Success");
        return back();
    }
}
