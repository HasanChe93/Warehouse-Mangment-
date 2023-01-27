<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
 
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        if (auth()->user()->role == 'admin') {
            return RouteServiceProvider::ADMIN_HOME;
        }
        elseif(auth()->user()->role == 'shipper') {
                return RouteServiceProvider::SHIPPER_HOME;
            }
        elseif(auth()->user()->role == 'employee') {
                return RouteServiceProvider::EMPLOYEE_HOME;
            }
        return RouteServiceProvider::HOME;
    }

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
