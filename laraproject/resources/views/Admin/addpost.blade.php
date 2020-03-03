@extends('admin.master')
@section('content')
<form action="newpost" method="POST" enctype="multipart/form-data">
  @csrf
    <label for="">title</label>
    <input type="text" name="title" class="form-control">
    <label for="">author</label>
    <input type="text" name="author" class="form-control">
    <label for="">description</label>
    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea> 
    <label for="">categories</label>
     <select name="categories" id="" class="form-control"> 
      @foreach ($cat as $b)
<option value="{{$b->catname}}">{{$b->catname}}</option>
@endforeach
    </select> 
    <label for="">image</label>
    <input type="file" name="image" class="form-control">
    <input type="submit" class="btn btn-success">

    
@endsection