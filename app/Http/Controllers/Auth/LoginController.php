<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'email|required|string',
            'password' => 'required|string|min:8'
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($login)) {
        // dd($user);
            if (Auth::user()->role == '1') {
                return redirect()->route('admin');
            } elseif (Auth::user()->role == '2') {
                return redirect()->route('coach');
            } else if(Auth::user()->role == '3'){
                return redirect()->route('index');
            } 
            return redirect()->route('login')->with(['error' => 'kamu tidak memiliki hak akses']);
        }
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->to('admin');
        } else { // false
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }
}
