
@extends('master')

@section('title', 'Add floor')

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

@if(Session::has('flash_message'))
<div id="alert" class="alert alert-success">
    {{ Session::get('flash_message') }}
</div>
@endif

@if(isset($floor))
<form action="/floor/{{$floor->id}}" method="POST" class="container">
    <div class="form-group col-md-6">
        <label>Floor name</label>
        <input type="text" name="name" class="form-control" value="{{$floor->name}}">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group col-md-12">
        <a class="btn btn-default" href="/floor">Back</a>
        <input type="submit" value="Edit" class="btn btn-default">
    </div>
</form>
@else
<form action="/floor" method="POST" class="container">
    <div class="form-group col-md-6">
        <label>Floor name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group col-md-12">
        <a class="btn btn-default" href="/floor">Back</a>
        <input type="submit" value="Add" class="btn btn-default">
    </div>
</form>
@endif

@endsection