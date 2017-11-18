<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image; // alternative for the use Image;
// use Image;
use File;


class AdminController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware(['auth','checkrole:admin']);
        $this->middleware('checkrole:admin');
    }

    public function index()
    {
        //base view for the admin area_gcj
        return view('admin.home_admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showProfile()
    {
        //
        return view('admin.profile_admin', array('user' => Auth::user() ));
    }
    
    public function update_avatar(Request $request){
        
        // delete users old image add this before uplading the new image. Remember to add "use File; on the top of the controller"
         if (Auth::user()->avatar != "default.jpg") {
             $path = '/uploads/avatar/';
             $lastpath= Auth::user()->avatar;
             File::Delete(public_path( $path . $lastpath) );
 
            }
            
        // Logic for user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatar/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
            
        }
 
        return view('admin.profile_admin', array('user' => Auth::user()) );
 
    }

    public function getRouteKeyName()
    {
    return 'slug';
    }
}
