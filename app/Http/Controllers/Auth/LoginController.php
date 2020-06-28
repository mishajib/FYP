<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use notify;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ( $user->hasAnyRole(['super', 'admin']) ) {// do your margic here
            notify()->success('Welcome back '.$user->name. ' !');
            $this->redirectTo = route('admin.dashboard');
        } else {
            notify()->success('Welcome back '.$user->name. ' !');
            $this->redirectTo = route('user.dashboard');
        }
    }

    protected function loggedOut(Request $request)
    {
        notify()->success('Logged out successfully');
        return redirect()->route('login');
    }
}
