<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\CourseMasterData;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseMasterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = CourseMasterData::all();
        return view('backEnd.coursedata.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('backEnd.coursedata.form', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|unique:course_master_data,name',
            'pre_name' => 'required',
        ]);

        try {
            if ($request->name == $request->pre_name) {
                notify()->warning("Course & Prequisite Can't Be Same", "Warning");
                return back();
            } else {
                CourseMasterData::create([
                    'name' => $request->name,
                    'pre_name' => $request->pre_name,
                ]);

                notify()->success("Course create successfully.", "Success");
                return redirect()->route('coursedata.index');
            }
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
        $department = CourseMasterData::findOrFail($id);
        return view('backEnd.coursedata.form', compact('department'));
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

        $department = CourseMasterData::findOrFail($id);

        $this->validate($request, [
            'name'  => 'required' . $department->id,
            'pre_name'  => 'required,' . $department->id,
        ]);

        try {
            $department->update([
                'name'     => $request->name,
                'pre_name'     => $request->pre_name,
            ]);

            notify()->success("Course Updated Successfully.", "Success");
            return redirect()->route('coursedata.index');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Course Update Failed", "Error");
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
        CourseMasterData::findOrFail($id)->delete();

        notify()->success("Course delete successfully.", "Success");
        return back();
    }
}
