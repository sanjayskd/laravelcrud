<?php

namespace App\Http\Controllers;

use App\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.addcat");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$data=categories::all();
       $o=new categories;
       $data= $o->get();
       return view("admin.viewcat",compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c=$request->catname;
        $o=new categories;
        $o->catname = $c;
        $o->save();
        return redirect("viewcat");
        // categories::insert(['catname'=>$c]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories,$id)
    {

     //   die($id);
        $data=$categories->where([["id","=","$id"]])->get();
    // print_r($data);
      return view("admin.editcat",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $categories)
    {
        $id=$request->id;
        $catname=$request->catname;
        $categories->where('id',"$id")->update(['catname'=>"$catname"]);
        return redirect("viewcat");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories,$id)
    {
       // echo $id;
         //$categories->where('id','=',$id)->delete();
        $categories->find($id)->delete();
        return redirect("viewcat");
    }
}
