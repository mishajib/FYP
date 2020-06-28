<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware([
            'auth',
            'role:super|admin'
        ]);
        $this->middleware('permission:access role')->only(['index', 'show']);
        $this->middleware('permission:create role')->only(['create', 'store']);
        $this->middleware('permission:edit role')->only(['edit', 'update']);
        $this->middleware('permission:delete role')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::all();
        return view('backend.admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'bail|required|string|unique:roles',
        ]);
        if ($validate->fails()) {
            return back()->with('toast_error', $validate->messages()->all()[0])->withInput();
        }
        $role = new Role();
        $role->name = $request->name;
        $role->slug = Str::slug($request->name);
        if ($role->save()) {
            toast('Data added successfully...','success');
            return redirect()->route('admin.roles.index');
        } else {
            toast('Something went wrong!!!','error');
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
        $role = Role::where('slug', $id)->first();
        return view('backend.admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::where('slug', $id)->first();
        return view('backend.admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $validate = Validator::make($request->all(), [
            'name' => 'bail|required|string|unique:roles,name,' . $role->id,
            'slug' => 'unique:roles,slug,' . $role->id,
        ]);
        if ($validate->fails()) {
            toast($validate->messages()->all()[0], 'error');
            return back();
        }
        $role->name = $request->name;
        $role->slug = Str::slug($request->name);
        if ($role->save()) {
            toast('Data updated successfully...','success');
            return redirect()->route('admin.roles.index');
        } else {
            toast('Something went\'t wrong!!!','error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if (count($role->users) > 0) {
            toast('Can\'t delete because role has users!!!','error');
            return back();
        } else {
            $role->delete();
            toast('Data deleted successfully...','success');
            return back();
        }
    }
}
