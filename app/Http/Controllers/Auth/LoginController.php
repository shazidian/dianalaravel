<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle login validation.
     */
    protected function credentials(Request $request)
    {
        $loginType = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        return [
            $loginType => $request->input('username'),
            'password' => $request->input('password'),
        ];
    }

    /**
     * If authentication is successful, redirect here.
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('login');
    }

    /**
     * If authentication fails, redirect back with error message.
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->route('login')
            ->withErrors(['error' => 'Email/Password salah!'])
            ->withInput($request->only('username', 'remember'));
    }
}