<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Application::get();
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
        Application::create(["fullname"=>$request->fullname,"email"=>$request->email,"phone"=>$request->phone,"dob"=>$request->dob,"sex"=>$request->sex,"address"=>$request->address,"job"=>$request->job,"salary"=>$request->salary,"marital"=>$request->marital,"status"=>"pending","cv"=>$request->cv]);

            return response()->json(['data'=>'saved']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }
    public function UpdateAccept(Request $request){
            $store=Application::where(["id"=>$request->id])->update(["status"=>"accepted"]);
            if($store){
                return response()->json(["data"=>"done"]);
            }
            else{
                return response()->json(["data"=>"error"]);
            }
    }
 public function UpdateReject(Request $request){
            $store=Application::where(["id"=>$request->id])->update(["status"=>"rejected"]);
            if($store){
                return response()->json(["data"=>"done"]);
            }
            else{
                return response()->json(["data"=>"error"]);
            }
    }
    public function returnAccepted(Request $request){
        $order=Application::where(["status"=>"accepted"])->get();
        if($order==null){
            return response()->json(["data"=>""]);
        }
        else{
            return response()->json(["data"=>$order]);
        }
    }
    public function returnRejected(Request $request){
        $order=Application::where(["status"=>"rejected"])->get();
        if($order==null){
            return response()->json(["data"=>""]);
        }
        else{
            return response()->json(["data"=>$order]);
        }
    }
        public function returnPending(Request $request){
        $order=Application::where(["status"=>"pending"])->get();
        if($order==null){
            return response()->json(["data"=>""]);
        }
        else{
            return response()->json(["data"=>$order]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
