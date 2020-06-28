<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class TrashUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware([
            'auth',
            'role:super|admin'
        ]);
        $this->middleware('permission:trash user')->only('index');
        $this->middleware('permission:restore user')->only('restore');
        $this->middleware('permission:delete trash user')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::onlyTrashed()->latest()->get();
        return view('backend.admin.user.trash', compact('users'));
    }

    public function restore($id)
    {
        try {
            $user = User::onlyTrashed()->findOrFail($id);
            $user->restore();
            notify()->success('User successfully restored...');
            return back();
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
            $user = User::onlyTrashed()->findOrFail($id);
            $user->forceDelete();
            notify()->success('User permanently deleted...');
            return back();
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }
    }
}
