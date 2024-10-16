<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = Client::get();
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
        //
    $mail=Client::where("email",$request->email)->first();
    if($mail!=null){
        return response()->json(["data"=>"email exists"]);
    }
    else{
            Client::create(["fullname"=>$request->fullname,"email"=>$request->email,"password"=>bcrypt($request->password)]);

            return response()->json(['data'=>'registered']);
        }
    }

         // Authenticate Users
     public function authenticate(Request $request){
         $credentials = $request->only('email', 'password');
         if (Auth::guard('Client')->attempt($credentials)) 
          {
            $user =Auth::guard('Client')->user();
             return response()->json(['data'=>$user], 200);
          }
          else
          {
             return response()->json(['data'=>'failed'],203);
          }
     }
    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
