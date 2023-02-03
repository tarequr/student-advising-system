<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backEnd.profile.index');
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name'    => 'required',
            'email'   => 'required',
            'phone'   => 'nullable',
            'avatar'  => 'nullable|image'
        ]);

        try {
            $user_id = Auth::user()->id;
            $user = User::findOrFail($user_id);
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->phone        = $request->phone;
            $user->fathers_name = $request->fathers_name;
            $user->mothers_name = $request->mothers_name;
            $user->gender       = $request->gender;

            if ($request->hasFile('avatar')) {
                $user->addMedia($request->avatar)->toMediaCollection('avatar');
            }

            // if ($request->hasFile('avatar')) {
            //     $file = $request->file('avatar');
            //     @unlink(public_path('upload/user_images/'.$user->avatar));
            //     $filename = 'IMG_'.date('YmdHi').'.'.$file->getClientOriginalExtension();
            //     $file->move(public_path('upload/user_images'),$filename);
            //     $user->avatar = $filename;
            // }

            $user->save();

            notify()->success("Profile update succesfully.", "Success");
            return back();

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            notify()->error("Profile update failed!", "Error");
            return back();
        }

    }

    public function password()
    {
        return view('backEnd.profile.password');
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request,[
            'current_password' => 'required',
            'password'         => 'required|confirmed|min:6',
        ]);

        $user = Auth::user();
        $hassedPassword = $user->password;

        if (Hash::check($request->current_password, $hassedPassword)) {
            if (!Hash::check($request->password, $hassedPassword)) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
                Auth::logout();
                return redirect()->route('login');
            }else{
                notify()->warning("New password can not be as old password!", "Warning");
                return back();
            }
        }else{
            notify()->error("Current password not match!", "Error");
            return back();
        }
        return back();
    }
}
