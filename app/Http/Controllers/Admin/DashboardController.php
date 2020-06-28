<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
        $this->middleware(['role:super|admin']);
        $this->middleware('permission:access dashboard');
    }

    public function index()
    {
        return view('backend.admin.dashboard');
    }
}
