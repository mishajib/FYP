<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware([
            'auth',
            'role:user'
        ]);
    }

    public function index()
    {
        return view('backend.profile');
    }

    public function updateProfile(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => "bail|required|string",
            "username" => "bail|string|unique:users,id" . Auth::id(),
            "title" => "bail|required|string",
            "email" => "bail|required|email|unique:users,id" . Auth::id(),
            "about" => "bail|required|string",
        ]);

        if ($validate->fails()) {
            notify()->error($validate->messages()->all()[0]);
            return back();
        }
        try {
            $user = User::findOrFail(Auth::id());
            $user->name = $request->name;
            $user->username = Auth::user()->username;
            $user->title = $request->title;
            $user->email = $request->email;
            $user->about = $request->about;
            $user->save();
            notify()->success('Profile successfully updated');
            return back();
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }

    }

    public function updateProfileImage(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "image" => "bail|image|max:3096",
        ], [
            "image.max" => "Maximum file size to upload is 3MB (3096 KB). If you are uploading a photo, try to reduce its resolution to make it under 3MB",
        ]);
        if ($validate->fails()) {
            return back()->with("toast_error", $validate->messages()->all()[0])->withInput();
        }

        try {
            $user = User::findOrFail(Auth::id());
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $slug = Str::slug(Auth::user()->name);
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('profile')) {
                    Storage::disk('public')->makeDirectory('profile');
                }
                //delete old image from slider directory
                if (Storage::disk('public')->exists('profile/' . $user->image)) {
                    Storage::disk('public')->delete('profile/' . $user->image);
                }

                $profile = Image::make($image)->resize(260, 260)->save();
                Storage::disk('public')->put('profile/' . $imagename, $profile);
            } else {
                $imagename = $user->image;
            }
            $user->image = $imagename;
            $user->save();
            notify()->success('Image successfully updated');
            return back();
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }

    }

    public function updatePassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        if ($validate->fails()) {
            return back()->with('toast_error', $validate->messages()->all()[0])->withInput();
        }

        $hashedPassword = Auth::user()->getAuthPassword();
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                notify()->success('Password successfully changed');
                return redirect(route('login'))->with(Auth::logout());
            } else {
                return back()->with("toast_error", "New password can't be the same as old password!");
            }
        } else {
            return back()->with("toast_error", "Current password does not matched!!!");
        }
    }


}
