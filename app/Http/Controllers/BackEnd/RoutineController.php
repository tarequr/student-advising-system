<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Routine;
use App\Models\Semester;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('routines.index');

        $user = Auth::user();
        if ($user->role_id == 3) {
            $routines = Routine::where('dept_id', $user->dept_id)->orderBy('id')->get();
            return view('backEnd.routine.index',compact('routines'));
        } else {
            $routines = Routine::orderBy('id')->get();
            return view('backEnd.routine.index',compact('routines'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('routines.create');

        $departments = Department::all();
        $semesters = Semester::orderBY('id')->get();

        return view('backEnd.routine.form',compact('departments','semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('routines.create');

        $this->validate($request,[
            'routine'    => 'required',
            'semester'   => 'required',
            'department' => 'required',
        ]);

        try {
            $routine_data = new Routine();
            $routine_data->dept_id  = $request->department;
            $routine_data->semester = $request->semester;

            if ($request->file('routine')) {
                $file = $request->file('routine');
                @unlink(public_path('file/routine/'.$routine_data->routine));
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('file/routine'),$filename);
                $routine_data->routine = $filename;
            }

            $routine_data->save();

            notify()->success("Routine create successfully.", "Success");
            return redirect()->route('routines.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Routine Create Failed.", "Error");
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
        Gate::authorize('routines.show');

        $data = Routine::findOrFail($id);
        return response()->download(public_path('file/routine/'.$data->routine));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('routines.destroy');

        try {
            $find_routine = Routine::findOrFail($id);
            if (!empty($find_routine)) {
                @unlink(public_path('file/routine/'.$find_routine->routine));
            }
            $find_routine->delete();

            notify()->success("Routine delete successfully.", "Success");
            return redirect()->route('routines.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Routine Delete Failed.", "Error");
            return back();
        }
    }
}
