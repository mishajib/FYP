<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:access user')->only(['index', 'show']);
        $this->middleware('permission:create user')->only(['create', 'store']);
        $this->middleware('permission:edit user')->only(['edit', 'update']);
        $this->middleware('permission:delete user')->only('destroy');
        $this->middleware('permission:admin user')->only('adminUser');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::with('roles')->latest()->get();
        return view('backend.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $request->validated();
        try {
            $user               = new User();
            $user->name         = $request->name;
            $user->username     = $request->username;
            $user->email        = $request->email;
            $user->phone_number = $request->mobile;
            $user->slug         = Str::slug($request->name);
            $user->password     = Hash::make("password"); // password
            $user->client_ip    = $request->ip();
            $user->machine_name = gethostname();
            $user->created_by   = Auth::user()->username;
            $user->updated_by   = Auth::user()->username;
            $user->save();
            notify()->success('User successfully added...');
            return redirect(route('admin.user.index'));
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('backend.admin.user.show', compact('user'));
        } catch (ModelNotFoundException $e) {
            notify()->error('User not found by ID ' . $id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('backend.admin.user.edit', compact('user'));
        } catch (ModelNotFoundException $e) {
            notify()->error('User not found by ID ' . $id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $request->validated();
        try {
            $user               = User::findOrFail($id);
            $user->name         = $request->name;
            $user->username     = $request->username;
            $user->email        = $request->email;
            $user->phone_number = $request->mobile;
            $user->slug         = Str::slug($request->name);
            $user->updated_by   = Auth::user()->username;
            $user->save();
            notify()->success('User successfully updated...');
            return redirect(route('admin.user.index'));
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            if (Auth::user()->id == $user->id) {
                notify()->error('Can\'t delete your own account!!!');
                return back();
            } else {
                $user->deleted_by = Auth::user()->username;
                $user->save();
                $user->delete();
                notify()->success('User successfully deleted');
                return back();
            }
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
        }

    }

    public function adminUser()
    {
        $users = User::with('roles')->role(['super', 'admin'])->latest()->get();
        return view('backend.admin.user.admin', compact('users'));
    }
}
