@extends('admin.master')
@section('content')
@foreach ($e as $a)
    {{-- <form action="updatepost" method="post" enctype="multipart/form-data"> --}}
        <div class="container">
                <div class="row">
                        <div class="col-md-2">
                        </div>
                    <div class="col-md-8">
                        <h2>edit your data</h2>
                        <a href="{{url('goback')}}" class="btn btn-info float-right">Go back</a>
{{Form::open(["url"=>"updatepost" ,"enctype"=>"multipart/form-data"]) }}
    @csrf
    <div class="form-group">
        
    <input type="text" value="{{$a->id}}" name="id" hidden>
    <label for="">title</label>
        <input type="text" value="{{$a['title']}}" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="name">
        <label for="">author</label>
        <input type="text" value="{{$a['author']}}" class="form-control" name="author" id="" aria-describedby="helpId" placeholder="name">
        <label for="">description</label>
        <input type="text" value="{{$a['description']}}" class="form-control" name="description" id="" aria-describedby="helpId" placeholder="name">
        <label for="">categories</label>
        <select name="categories" id="" class="form-control">
       @foreach ($c as $c)
<option value="{{$c->catname}}">{{$c->catname}}</option>
@endforeach
        </select>
        <label for="">Image</label>
    <input type="file" name="image" > 
   
    <button type="submit" class="btn btn-success">Submit</button>
    {{Form::close()}}
{{-- </form> --}}
    </div></div></div>
      <div class="col-md-2"> 
    <h1>your previous image</h1>
    {{-- {{('public/img/'.$a->image)}} --}}
    <img height="100px;" src="{{('public/img/'.$a->image)}}" alt="">
   </div> 
@endforeach
@endsection