<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('preventBackHistory');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request->user()->authorizeRoles(['Admin', 'Super']);
        // return view('home');
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
                // return redirect()->intended('/welcome');
                return redirect()->back();
                // return redirect()->route('home');


    }
}
