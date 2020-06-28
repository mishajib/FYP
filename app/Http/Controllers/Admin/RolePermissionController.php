<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware([
            'auth',
            'role:super|admin'
        ]);
        $this->middleware('permission:access user role')->only('allUserRole');
        $this->middleware('permission:give user role')->only(['giveUserRolePage', 'giveUserRoleStore']);
        $this->middleware('permission:edit user role')->only(['editUserRolePage', 'updateUserRole']);
        $this->middleware('permission:delete user role')->only('removeUserRole');
        $this->middleware('permission:access role permission')->only(['allRolePermission', 'showRolePermissionPage']);
        $this->middleware('permission:give role permission')->only(['giveRolePermissionPage', 'giveRolePermissionStore']);
        $this->middleware('permission:edit role permission')->only(['editRolePermissionPage', 'updateRolePermission']);
        $this->middleware('permission:delete role permission')->only(['removeRolePermission', 'removeRolePermissionFromShowPage']);
        $this->middleware('permission:access user permission')->only(['allUserPermission', 'showUserPermissionPage']);
        $this->middleware('permission:give user permission')->only(['giveUserPermissionPage', 'giveUserPermissionStore']);
        $this->middleware('permission:edit user permission')->only(['editUserPermissionPage', 'updateUserPermission']);
        $this->middleware('permission:delete user permission')->only(['removeUserPermission', 'removeUserPermissionFromShowPage']);
    }

    // User Role Methods
    public function allUserRole()
    {
        $users = User::with('roles')->get();
        return view('backend.admin.role.all-user-role', compact('users'));
    }

    public function giveUserRolePage()
    {
        $data['users'] = User::all();
        $data['roles'] = Role::all();
        return view('backend.admin.role.user-role')->with($data);
    }

    public function giveUserRoleStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user' => 'bail|required|string',
            'role' => 'bail|required|string',
        ]);

        if ($validate->fails()) {
            return back()->with('toast_error', $validate->messages()->all()[0])->withInput();
        }
        try {
            $user = User::findOrFail($request->user);
            $role = Role::findOrFail($request->role);
            $user->assignRole($role);
            notify()->success($role->name . ' role successfully give to this ' . $user->name);
            return back();

        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

    public function editUserRolePage($id)
    {
        $data['fuser'] = User::where('slug', $id)->first();
        $data['users'] = User::all();
        $data['roles'] = Role::all();
        return view('backend.admin.role.edit-user-role')->with($data);
    }

    public function updateUserRole(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'user' => 'bail|required|string',
            'role' => 'bail|required|string',
        ]);

        if ($validate->fails()) {
            return back()->with('toast_error', $validate->messages()->all()[0])->withInput();
        }
        try {
            $user = User::findOrFail($id);
            if (Auth::user()->id == $user->id && !$user->hasRole('super')) {
                notify()->error('Authenticated User can not edit own user role!!!');
                return back();
            } else {
                $user = User::findOrFail($request->user);
                $role = Role::findOrFail($request->role);
                $user->syncRoles($role);
                notify()->success('Updated role ' . $role->name . ' role successfully give to this ' . $user->name);
                return back();
            }

        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

    public function removeUserRole($id)
    {
        $user = User::findOrFail($id);
        if (Auth::user()->id == $user->id) {
            notify()->error('Authenticated user can\'t delete own role.');
            return back();
        } else {
            $user->removeRole($user->roles->first());
            notify()->success('User all roles has been successfully removed...');
            return back();
        }
    }
    // ! End User Role Methods


    // Role Permission Methods
    public function allRolePermission()
    {
        $roles = Role::with('permissions')->get();
        return view('backend.admin.permission.all-role-permission', compact('roles'));
    }

    public function giveRolePermissionPage()
    {
        $data['roles'] = Role::all();
        $data['permissions'] = Permission::all();
        return view('backend.admin.permission.role-permission')->with($data);
    }

    public function giveRolePermissionStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'role' => 'bail|required|string',
            'permissions' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('toast_error', $validate->messages()->all()[0])->withInput();
        }
        try {
            $role = Role::findOrFail($request->role);
            $role->givePermissionTo($request->permissions);
            notify()->success('Permissions successfully give to this ' . $role->name . ' role.');
            return back();

        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

    public function editRolePermissionPage($id)
    {
        $data['frole'] = Role::where('slug', $id)->first();
        $data['roles'] = Role::all();
        $data['permissions'] = Permission::all();
        return view('backend.admin.permission.edit-role-permission')->with($data);
    }

    public function showRolePermissionPage($id)
    {
        $role = Role::where('slug', $id)->first();
        return view('backend.admin.permission.show-role-permission', compact('role'));
    }

    public function updateRolePermission(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'role' => 'bail|required|string',
            'permissions' => 'bail|required',
        ]);

        if ($validate->fails()) {
            return back()->with('toast_error', $validate->messages()->all()[0])->withInput();
        }
        try {
            $role = Role::findOrFail($id);
            $role->syncPermissions($request->permissions);
            notify()->success(' Updated permissions successfully give to this ' . $role->name . ' role.');
            return back();

        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

    public function removeRolePermission($id)
    {
        $role = Role::findOrFail($id);
        if ($role->name == 'super') {
            notify()->error('Super role permissions can\'t be removed!!!');
            return back();
        } else {
            $role->permissions()->detach();
            notify()->success('Role all permissions has been successfully removed...');
            return back();
        }
    }

    public function removeRolePermissionFromShowPage($id, $per_id)
    {
        $role = Role::findOrFail($id);
        if ($role->name == "super") {
            notify()->error('Super Admin role permission can\'t be removed!!!');
            return back();
        } else {
            $permission = Permission::findOrFail($per_id);
            $role->revokePermissionTo($permission);
            notify()->success("Remove " . $permission->name . " permission from " . $role->name . "role.");
            return back();
        }
    }

    // ! End Role Permission Methods


    // User Permission Methods
    public function allUserPermission()
    {
        $users = User::with('permissions')->get();
        return view('backend.admin.permission.all-user-permission', compact('users'));
    }

    public function giveUserPermissionPage()
    {
        $data['users'] = User::all();
        $data['permissions'] = Permission::all();
        return view('backend.admin.permission.user-permission')->with($data);
    }

    public function giveUserPermissionStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user' => 'bail|required|string',
            'permissions' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('toast_error', $validate->messages()->all()[0])->withInput();
        }
        try {
            $user = User::findOrFail($request->user);
            $user->givePermissionTo($request->permissions);
            notify()->success('Permissions successfully give to this ' . $user->name . ' user.');
            return back();

        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

    public function editUserPermissionPage($id)
    {
        $data['fuser'] = User::where('slug', $id)->first();
        $data['users'] = User::all();
        $data['permissions'] = Permission::all();
        return view('backend.admin.permission.edit-user-permission')->with($data);
    }

    public function showUserPermissionPage($id)
    {
        $user = User::where('slug', $id)->first();
        return view('backend.admin.permission.show-user-permission', compact('user'));
    }

    public function updateUserPermission(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'user' => 'bail|required|string',
            'permissions' => 'bail|required',
        ]);

        if ($validate->fails()) {
            return back()->with('toast_error', $validate->messages()->all()[0])->withInput();
        }
        try {
            $user = User::findOrFail($id);
            $user->syncPermissions($request->permissions);
            notify()->success(' Updated permissions successfully give to this ' . $user->name . ' user.');
            return back();

        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }

    public function removeUserPermission($id)
    {
        $user = User::findOrFail($id);
        if ($user->hasRole('super')) {
            notify()->error('Super User permissions can\'t be removed!!!');
            return back();
        } else {
            $user->permissions()->detach();
            notify()->success('User all permissions has been successfully removed...');
            return back();
        }
    }

    public function removeUserPermissionFromShowPage($id, $per_id)
    {
        $user = User::findOrFail($id);
        if ($user->hasRole('super')) {
            notify()->error('Super Admin user permission can\'t be removed!!!');
            return back();
        } else {
            $permission = Permission::findOrFail($per_id);
            $user->revokePermissionTo($permission);
            notify()->success("Remove " . $permission->name . " permission from " . $user->name . "user.");
            return back();
        }
    }

    // ! End Role Permission Methods


}
