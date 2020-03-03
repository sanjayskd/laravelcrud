@extends('admin.master')
@section('content')
<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    @foreach ($data as $a)
    <tr>
        <td>{{$a->id}}</td>
        <td>{{$a->catname}}</td>
        <td><a href="delcat/{{$a->id}}" class="btn btn-danger">Delete</a></td>
        <td><a href="editcat/{{$a->id}}" class="btn btn-danger">Edit</a></td>
    </tr>
    @endforeach
</table>
@endsection