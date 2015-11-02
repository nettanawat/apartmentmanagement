
@extends('master')

@section('title', 'Room type list')

@section('content')
@if (count($errors) > 0)

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/roomtype" method="POST" class="form-inline text-right">
    <div class="form-group">
        <input type="text" name="name" class="form-control">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <input type="submit" value="Submit" class="btn btn-default">
</form>
<table style="margin-top: 10px;" class="table table-striped">
    <tr>
        <th>#</th>
        <th>name</th>
        <th>created_at</th>
        <th>updated_at</th>
    </tr>
    @foreach ($roomTypes as $roomType)
    <tr>
        <td>{{$roomType->id}}</td>
        <td>{{$roomType->name}}</td>
        <td>{{$roomType->created_at}}</td>
        <td>{{$roomType->updated_at}}</td>
    </tr>
    @endforeach
</table>

@endsection
