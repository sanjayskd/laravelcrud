<?php

namespace App\Http\Controllers;

use App\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         if(session('email'))
         {
        return view("admin.dashboard");
    }
    else{
        echo "you must login";
    }}

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
       //        echo "testing";
       $email= $request->email;
       $password= $request->password;
       
       $data=Admin::where([
           ['email','=',"$email"],
           ['password','=',"$password"]
       ])->get();
       
//      print_r($data);
  
       if(count($data))
       {
        session(['email'=>"$email"]);
          return redirect("dashboard");
       }else{
           echo "wrong id and pass";
           return view("admin.login");
       }
       
   }


    /**
     * Display the specified resource.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('admin');
    }
}
