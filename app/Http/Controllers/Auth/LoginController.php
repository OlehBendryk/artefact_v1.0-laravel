<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

//    public function credentials(Request $request)
//    {
//        return ['email' => $request->{$this->username()}, 'password' => $request->password];
//    }

//    protected function attemptLogin(Request $request)
//    {
//        $data = $this->credentials($request);
//        $ifExist = Moderator::where('email', $data['email'])->where('password', $data['password'])->first();
//
//        if ($ifExist) {
//            return true;
//        }
//
//        return false;
//    }

