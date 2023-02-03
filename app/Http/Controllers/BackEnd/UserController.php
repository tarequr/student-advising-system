<?php

namespace App\Http\Controllers\BackEnd;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Batch;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('users.index');

        $users = User::all();
        return view('backEnd.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Gate::authorize('users.create');



        $roles       = Role::all();
        $batchs      = Batch::all();
        $departments = Department::all();

        return view('backEnd.users.form',compact('roles','departments','batchs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('users.create');

        $this->validate($request,[
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|confirmed|string|min:8',
            'gender'     => 'required',
            'department' => 'required',
            'batch'      => $request->user_type == "student" ? 'required' : '',
            'avatar'     => 'required|image',
            'role'       => 'required',
            'status'     => 'required'
        ]);

        try {

            // $user_id = date("Ym").rand(100,999);
            $startOfYear = Carbon::now()->startOfYear();
            $endOfYear = Carbon::now()->endOfYear();
            $students = User::where('created_at', '>' , $startOfYear)->where('created_at', '<', $endOfYear)->get();
            $count = count($students) + 1;

            $user = User::create([
                'role_id'       => $request->role,
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'gender'        => $request->gender,
                'dept_id'       => $request->department,
                'batch_id'      => $request->batch ? $request->batch : NULL,
                'user_id'       => Carbon::now()->toDateString().$count,
                'status'        => $request->filled('status')
            ]);

            if ($request->hasFile('avatar')) {
                $user->addMedia($request->avatar)->toMediaCollection('avatar');
            }

            notify()->success("User create successfully.", "Success");
            return redirect()->route('users.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("User Create Failed.", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('users.edit');
        // return $user;
        $roles       = Role::all();
        $batchs      = Batch::all();
        $departments = Department::all();

        return view('backEnd.users.form',compact('roles','departments','batchs','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('users.edit');

        $this->validate($request,[
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password'   => 'nullable|confirmed|string|min:8',
            'gender'     => 'required',
            'department' => 'required',
            'batch'      => $request->user_type == "student" ? 'required' : '',
            'avatar'     => 'nullable|image',
            'role'       => 'required'
        ]);

        try{
            $user->update([
                'role_id'  => $request->role,
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => isset($request->password) ? Hash::make($request->password) : $user->password,
                'gender'   => $request->gender,
                'dept_id'  => $request->department,
                'batch_id' => $request->batch ? $request->batch : NULL,
                'status'   => $request->filled('status')
            ]);

            if ($request->hasFile('avatar')) {
                $user->addMedia($request->avatar)->toMediaCollection('avatar');
            }

            notify()->success("User Updated Successfully.", "Success");
            return redirect()->route('users.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("User Update Failed", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('users.destroy');

        $user->delete();

        notify()->success("User Deleted Successfully.", "Success");
        return back();
    }
}
