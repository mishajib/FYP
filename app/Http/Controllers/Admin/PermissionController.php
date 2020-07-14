<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:access permission')->only(['index', 'show']);
        $this->middleware('permission:create permission')->only(['create', 'store']);
        $this->middleware('permission:edit permission')->only(['edit', 'update']);
        $this->middleware('permission:delete permission')->only(['destroy', 'removeRole', 'removeUser']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionRequest $request)
    {
        $request->validated();
        $permission = new Permission();
        $permission->name = Str::lower($request->name);
        $permission->slug = Str::slug($request->name);
        $permission->save();
        $role = Role::findByName('super');
        $role->givePermissionTo($request->name);
        notify()->success('Permission successfully added...');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $permission = Permission::where('slug', $id)->first();
        return view('backend.admin.permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $permission = Permission::where('slug', $id)->first();
        return view('backend.admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionRequest $request, $id)
    {
        $request->validated();
        $permission = Permission::findOrFail($id);
        $permission->name = Str::lower($request->name);
        $permission->slug = Str::slug($request->name);
        $role = Role::findByName('super');
        $role->givePermissionTo(Permission::all());
        $permission->save();
        notify()->success('Permission successfully updated...');
        return redirect(route('admin.permissions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        if (count($permission->roles) or count($permission->users)) {
            notify()->error("Permission can't be deleted! permission is associated with roles or users.");
            return back();
        } else {
            $permission->delete();
            toast('Permission deleted successfully', 'success');
            return back();
        }
    }

    public function removeUser($id, $per_id)
    {
        $user = User::findOrFail($id);
        if ($user->hasRole('super')) {
            notify()->error('Super Admin user permission can\'t be removed!!!');
            return back();
        }
        $permission = Permission::findOrFail($per_id);
        $user->revokePermissionTo($permission);
        notify()->success("Remove " . $permission->name . " permission from " . $user->name . "user.");
        return back();
    }

    public function removeRole($id, $per_id)
    {
        $role = Role::findOrFail($id);
        if ($role->name == 'super') {
            notify()->error('Super Admin role permission can\'t be removed!!!');
            return back();
        }
        $permission = Permission::findOrFail($per_id);
        $role->revokePermissionTo($permission);
        notify()->success("Remove " . $permission->name . " permission from " . $role->name . "role.");
        return back();
    }
}
