@extends('admin.master')
@section('content')
<form action="newcat" method="post">
    @csrf
    <div class="form-group">
        <label for="">catname</label>
        <input type="text" class="form-control" name="catname" id="" aria-describedby="helpId" placeholder="name">
    </div>
    <button type="submit" class="btn btn-success">Addnew</button>
</form>
@endsection