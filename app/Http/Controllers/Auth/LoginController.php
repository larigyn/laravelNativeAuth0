<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*public function authenticated(Request $request)
        {           
            //either of this two will work jsut choose one
            if($request->user()->hasRole('admin'))
                {                    
                    return redirect()->route('admin.index');
                }
            if($request->user()->hasRole('super'))
                {
                    return redirect()->route('super.index');
                }
            if($request->user()->hasRole('officer'))
                {
                    return redirect()->route('officer.index');
                }
            if($request->user()->hasRole('guest'))
                {
                    return redirect()->route('guest.index');
                }

            if(Auth::check()) 
                {
                    
                    if(Auth::user()->hasRole('Admin')) {
                        return redirect()->route('admin.index');
                    } 
                    if (Auth::user()->hasRole('Super')) {                                
                        return redirect()->route('super.index');
                    }
                    if (Auth::user()->hasRole('Officer')) {
                        return redirect()->route('officer.index');
                    } 
                    if (Auth::user()->hasRole('Guest')) {
                        return redirect()->route('guest.index');
                    } 
                        
                } 
               
        } */
        
}
