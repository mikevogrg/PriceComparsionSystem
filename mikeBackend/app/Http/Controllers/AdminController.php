<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $query = Admin::get();
        if($query!=null){
            return response()->json(["data"=>$query]);
        }
        else{
            return response()->json(["data"=>"no data"]);
        }
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
    $mail=Admin::where("email",$request->email)->first();
    if($mail!=null){
        return response()->json(["data"=>"email exists"]);
    }
    else{
            Admin::create(["fullname"=>$request->fullname,"email"=>$request->email,"company"=>$request->company,"password"=>bcrypt($request->password)]);

            return response()->json(['data'=>'registered']);
        }
    }



         // Authenticate Users
     public function authenticate(Request $request){
         $credentials = $request->only('email', 'password');
         if (Auth::guard('Admin')->attempt($credentials)) 
          {
            $user =Auth::guard('Admin')->user();
             return response()->json(['data'=>$user], 200);
          }
          else
          {
             return response()->json(['data'=>'failed'],203);
          }
     }
    public function logout(Request $request) {
      
        Auth::guard('Client')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(["data"=>"done"]);
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
