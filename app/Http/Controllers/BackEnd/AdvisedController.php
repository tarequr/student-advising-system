<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Course;
use App\Models\Advised;
use Illuminate\Http\Request;
use App\Models\AdvisedCourse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\CourseMasterData;
use App\Models\Semester;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdvisedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('advised.index');

        $advisors = Advised::all();
        return view('backEnd.advisor.index', compact('advisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('advised.create');

        $students = User::where('role_id', 3)->get();
        $courses = Course::orderBY('id')->get();
        $semesters = Semester::orderBY('id')->get();
        // dd($courses);
        return view('backEnd.advisor.create', compact('courses', 'students', 'semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('advised.create');

        try {
            DB::beginTransaction();

            if (!(DB::table('adviseds')
                ->join('advised_courses', 'adviseds.id', '=', 'advised_courses.advised_id')
                ->where('adviseds.student_id', $request->student)
                ->where('advised_courses.semister', $request->semister))->exists()) {
                $all_datas = $request->course_id;

                // dd($all_datas);
                if (!empty($all_datas)) {
                    $advised = Advised::create([
                        'student_id' => $request->student,
                        'teacher_id' => Auth::user()->id,
                    ]);

                    foreach ($all_datas as $key => $data) {
                        $new_datas = explode(",", $data);

                        // dd($new_datas);
                        $prequisite = CourseMasterData::where('name', $new_datas[0])->first();
                        if ($prequisite) {
                            if (DB::table('adviseds')
                                ->join('advised_courses', 'adviseds.id', '=', 'advised_courses.advised_id')
                                ->where('advised_courses.course_id', $prequisite->pre_name)
                                ->where('adviseds.student_id', $request->student)->exists()
                            )

                            {
                                $all_course_val = [
                                    'advised_id' => $advised->id,
                                    'course_id'  => $new_datas[0],
                                    'credit'     => $new_datas[1],
                                    'fee'        => $new_datas[2],
                                    'semister'   => $request->semister
                                ];
                                AdvisedCourse::create($all_course_val);
                                DB::commit();

                            } else {
                                notify()->warning("Prequisite Not Yet Completed", "Warning");
                                return back();
                            }


                        } else {
                                $all_course_val = [
                                    'advised_id' => $advised->id,
                                    'course_id'  => $new_datas[0],
                                    'credit'     => $new_datas[1],
                                    'fee'        => $new_datas[2],
                                    'semister'   => $request->semister
                                ];
                                AdvisedCourse::create($all_course_val);
                                DB::commit();
                                // notify()->success("Advised create successfully.", "Success");
                                // return redirect()->route('advised.create');

                        }
                    }

                    notify()->success("Advised create successfully.", "Success");
                    return redirect()->route('advised.create');

                }
            } else {
                notify()->warning("This student already completed advising", "Warning");
                return redirect()->route('advised.create');
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();
            notify()->error("Advised Create Failed.", "Error");
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
        Gate::authorize('advised.edit');
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
        Gate::authorize('advised.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('advised.destroy');
    }
}
