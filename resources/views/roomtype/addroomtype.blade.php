
@extends('master')

@section('title', 'Add customer')

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
@if(isset($roomType))

<form action="/roomtype/{{$roomType->id}}" method="POST" class="container">
    <div class="form-group col-md-6">
        <label>Type name</label>
        <input type="text" name="name" class="form-control" value="{{$roomType->name}}">
    </div>
    <div class="form-group col-md-6">
        <label>Daily price</label>
        <input type="text" name="daily_price" class="form-control" value="{{$roomType->daily_price}}">
    </div>
    <div class="form-group col-md-6">
        <label>Monthly price</label>
        <input type="text" name="monthly_price" class="form-control" value="{{$roomType->monthly_price}}">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group col-md-12">
        <a class="btn btn-default" href="/roomtype">Back</a>
        <input type="submit" value="Update" class="btn btn-default">
    </div>
</form>

@else
<form action="/roomtype" method="POST" class="container">
    <div class="form-group col-md-6">
        <label>Type name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label>Daily price</label>
        <input type="text" name="daily_price" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label>Monthly price</label>
        <input type="text" name="monthly_price" class="form-control">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group col-md-12">
        <a class="btn btn-default" href="/roomtype">Back</a>
        <input type="submit" value="Add" class="btn btn-default">
    </div>
</form>
@endif

@endsection