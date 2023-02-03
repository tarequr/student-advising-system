<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Result;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;

class ResultController extends Controller
{
    public function create()
    {
        Gate::authorize('result.index');

        $students = User::where('role_id',3)->get();
        $courses =Result::orderBY('id')->get();
        $semesters = Semester::orderBY('id')->get();

        // dd($courses);
        return view('backEnd.result.create',compact('courses','students','semesters'));
    }

    public function store(Request $request)
    {
        Gate::authorize('result.store');

        try {
            if(!Result::where('student_id',$request->student)->where('semester',$request->semister)->exists()){

                Result::create([
                    'student_id' => $request->student,
                    'semester' => $request->semister,
                    'result' => $request->result,
                ]);

                notify()->success("Result create successfully.", "Success");
                return redirect()->route('result.index');
            }else{
                notify()->warning("Result Already Exists", "Warning");
                return redirect()->route('result.index');
            }

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Result Create Failed.", "Error");
            return back();
        }
    }
}
