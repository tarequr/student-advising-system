<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Role;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('roles.index');

        $roles = Role::all();
        return view('backEnd.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('roles.create');

        $modules = Module::all();
        return view('backEnd.role.form',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('roles.create');

        $this->validate($request,[
            'name'          => 'required|unique:roles,name',
            'permissions'   => 'required|array',
            'permissions.*' => 'integer'
        ]);

        try {
            Role::create([
                'name'  => $request->name,
                'slug'  => Str::slug($request->name),
            ])->permissions()->sync(
                $request->input('permissions'),[]
            );

            notify()->success("Roles Created Successfully.", "Success");
            return redirect()->route('roles.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Roles Create Failed.", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('roles.edit');

        $modules = Module::all();
        return view('backEnd.role.form',compact('modules','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('roles.edit');

        $this->validate($request,[
            'name'          => 'required',
            'permissions'   => 'required|array',
            'permissions.*' => 'integer'
        ]);

        try {
            $role->update([
                'name'  =>  $request->name,
                'slug'  =>  Str::slug($request->name)
            ]);

            $role->permissions()->sync(
                $request->input('permissions')
            );

            notify()->success("Roles Updated Successfully.", "Success");
            return redirect()->route('roles.index');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Role Update Failed.", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('roles.destroy');

        try {
            if ($role->deletable) {
                $role->delete();

                notify()->success("Role Deleted Successfully.", "Success");
                return back();
            }else{
                notify()->error("You can't delete system role", "Error");
                return back();
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Role Delete Failed.", "Error");
            return back();
        }
    }
}
