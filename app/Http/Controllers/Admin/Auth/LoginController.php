<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = 'admin/home';

    
    // protected function authenticated(Request $request, $user)
    // {
    //     if($user->user_group == '0') {
    //         return redirect('/home');
    //     }

    //     return redirect('admin/home');
    // }


    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $guard = $this->guard();
        //dd($guard);
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('admin-login');
    }

    protected function credentials(Request $request)
    {

        //return $request->only($this->username(), 'password');

        

        $admin = Admin::where(['email' => $request->email])->first();

        if(empty($admin))
        {
            return $request->only($this->username(), 'password');
        }else
        {
            if($admin->status == 0)
            {
               
                return ['email' => 'inactive','password' => 'You are not an active person,contact with admin'];

            }else
            {
                
                return ['email' => $request->email,'password' => $request->password,'status' => 1];

            }
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

}
