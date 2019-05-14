<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
//    protected $redirectTo = '/home';

    public function redirectTo()
    {
        if (session('link')) {
            $this->redirectTo = session('link');
        }

        return $this->redirectTo ?? '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }m

    public function showLoginForm()
    {
        $title = 'Login';
        $cart = session()->get('cart');
        return view('auth.login')->with(['cart'=> $cart,  "title" => 'Login', "page" => 'login']);
    }
}
