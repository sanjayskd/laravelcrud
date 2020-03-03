<?php

namespace App\Http\Controllers;

use App\post;
use App\categories;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $o= new categories;
        $cat=$o->get();
        return view("admin.addpost",compact("cat"));
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
        $img=$request->file('image');
        // print_r("$img");
         $ext=$img->getClientOriginalExtension();
         $imgname=$img->getClientOriginalName();
         $newname=uniqid().".".$ext;
         $path=public_path("img");
         if($img->move($path,$newname))
         {
             // to receive value from ,hrere title author are the name in from
             $title=$request->title;
             
             $author=$request->author;
             $description=$request->description;
             $categories=$request->categories;
             //here we create object of post class (post table) with object and store our value
             $o=new post;
             $o->title=$title;
             $o->author=$author;
             $o->image=$newname;
             $o->description=$description;
             $o->categories=$categories;
             if($o->save())
             {
                 return redirect("viewpost");
             }
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        $pdata=$post->all();
        return view("admin.allpost",compact("pdata"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post,$id)
    {
        $data=$post->where([["id","=","$id"]])->get();
        // print_r($data);
        //   return view("admin.editpost",compact("data"));
        $pdata=categories::all();
        return view("admin.editpost")->with("c",$pdata)->with("e",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $id=$request->id;
        $title=$request->title;
        $author=$request->author;
        $description=$request->description;
         $categories=$request->categories;
          $image=$request->file('image');
          if(empty($image))
          {
        $post->where('id',"$id")->update(['title'=>"$title",'author'=>"$author",'description'=>"$description",'categories'=>"$categories"]);
        return redirect("viewpost");

          }else{
         $ext=$image->getClientOriginalExtension();
         $imgname=$image->getClientOriginalName();
         $newname=uniqid().".".$ext;
         if($ext=="jpg" or $ext == "png" or $ext =="gif")
         {
         $path=public_path("img");
        if( $image->move($path,$newname))
        {
            $post->where('id',"$id")->update(['title'=>"$title",'author'=>"$author",'description'=>"$description",'categories'=>"$categories","image"=>$newname]);
       return redirect("viewpost");
        }}
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post,$id)
    {
        $post->find($id)->delete();
        return redirect("viewpost");
    }
    public function goback(post $post)
    {
        return redirect("viewpost");
    }
}
