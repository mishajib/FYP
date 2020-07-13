<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:access dashboard');
    }

    public function index()
    {
        return view('backend.user.dashboard');
    }
}
