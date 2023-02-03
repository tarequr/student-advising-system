<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('courses.index');

        $courses = Course::all();
        return view('backEnd.course.index', compact('courses'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('courses.create');

        $departments = Department::orderBy('id')->get();
        $teachers    = User::where('role_id',2)->get();

        return view('backEnd.course.form',compact('departments','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('courses.create');

        $this->validate($request,[
            'code'       => 'required',
            'name'       => 'required',
            'credit'     => 'required',
            'teacher'    => 'required',
            'amount'     => 'required',
            'department' => 'required',
        ]);

        try {
            Course::create([
                'dept_id'    => $request->department,
                'teacher_id' => $request->teacher,
                'code'       => $request->code,
                'name'       => $request->name,
                'credit'     => $request->credit,
                'amount'     => $request->amount,
                'status'     => $request->filled('status')
            ]);

            notify()->success("Course create successfully.", "Success");
            return redirect()->route('courses.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Course Create Failed.", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('courses.edit');

        $course      = Course::findOrFail($id);
        $teachers    = User::where('role_id',2)->get();
        $departments = Department::orderBy('id')->get();

        return view('backEnd.course.form',compact('departments','teachers','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('courses.edit');

        $course = Course::findOrFail($id);

        $this->validate($request,[
            'code'       => 'required',
            'name'       => 'required',
            'credit'     => 'required',
            'teacher'    => 'required',
            'amount'     => 'required',
            'department' => 'required',
        ]);

        try {
            $course->update([
                'dept_id'    => $request->department,
                'teacher_id' => $request->teacher,
                'code'       => $request->code,
                'name'       => $request->name,
                'credit'     => $request->credit,
                'amount'     => $request->amount,
                'status'     => $request->filled('status')
            ]);

            notify()->success("Course update successfully.", "Success");
            return redirect()->route('courses.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Course Update Failed.", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('courses.destroy');

        $course = Course::findOrFail($id);
        $course->delete();

        notify()->success("Course delete successfully.", "Success");
        return back();
    }
}
