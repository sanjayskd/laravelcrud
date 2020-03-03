@extends('admin.master')
@section('content')
<table class="table table-hover">
<tr>
    <th>title</th>
    <th>author</th>
    <th>Description</th>
    <th>categories</th>
    <th>Image</th>
    <th>Delete</th>
    <th>Edit</th> 
</tr>
@foreach($pdata as $pdata)
<tr>
    <td>
        {{$pdata->title}}
    </td>
    <td>
            {{$pdata->author}}
        </td>
        <td>
                {{$pdata->description}}
            </td>
            <td>
                    {{$pdata->categories}}
                </td>
                <td><img height="100px;" src="{{('public/img/'.$pdata->image)}}" alt=""></td>
                <td><a href="delpost/{{$pdata->id}}" class="btn btn-danger">Delete</a></td>
            <td><a href="{{url('editpost')}}/{{$pdata->id}}" class="btn btn-warning">Edit</a></td>
</tr>
@endforeach
</table>
@endsection