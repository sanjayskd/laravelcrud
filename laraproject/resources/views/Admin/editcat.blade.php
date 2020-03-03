@extends('admin.master')
@section('content')
<?php foreach ($data as $a)
{
    ?>
    {{Form::open(["url"=>"updatecat"])}}
    @csrf
    <div class="form-group">
        <label for="">catname</label>
        <input type="text" value="{{$a['catname']}}" class="form-control" name="catname" id="" aria-describedby="helpId" placeholder="name">
    <input type="text" value="{{$a->id}}" name="id" hidden>
    </div>
    <button type="submit" class="btn btn-success">Addnew</button>
</form>
{{Form::close()}}
<?php }
?>
@endsection