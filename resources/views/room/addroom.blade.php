@extends('master')

@section('title', 'Room list')

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

@if(isset($roomTypes))

    @if(isset($room))
    <form action="/room/{{$room->id}}" method="POST" class="container">
        <div class="form-group col-md-6">
            <label>Room name</label>
            <input type="text" name="name" class="form-control" value="{{$room->name}}">
        </div>
        <div class="form-group col-md-6">
            <label>Room type</label>
            <select name="roomType" class="form-control">
                @foreach ($roomTypes as $roomType)
                @if($room->roomType->id == $roomType->id)
                    <option selected value="{{$roomType->id}}">{{$roomType->name}}</option>
                @else
                    <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Room floor</label>
            <select name="floor" class="form-control">
                @foreach ($floors as $floor)
                        <option value="{{$floor->id}}">{{$floor->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Max customer</label>
            <input type="text" name="max_customer" class="form-control" value="{{$room->max_customer}}">
        </div>
        <div class="form-group col-md-6">
            <label>Description</label>
            <textarea class="form-control" rows="3" name="description">{{$room->description}}</textarea>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group col-md-12">
            <a href="/room" class="btn btn-default">Back</a>
            <input type="submit" name="Update" class="btn btn-default">
        </div>
    </form>
    @else
    <form action="/room" method="POST" class="container">
        <div class="form-group col-md-6">
            <label>Room name</label>
            <input type="text" name="name" class="form-control" autofocus>
        </div>
        <div class="form-group col-md-6">
            <label>Room type</label>
            <select name="roomType" class="form-control">
                @foreach ($roomTypes as $roomType)
                <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Room floor</label>
            <select name="floor" class="form-control">
                @foreach ($floors as $floor)
                <option value="{{$floor->id}}">{{$floor->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Max customer</label>
            <input type="text" name="max_customer" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label>Description</label>
            <textarea class="form-control" rows="3" name="description"></textarea>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group col-md-12">
            <a href="/room" class="btn btn-default">Back</a>
            <input type="submit" name="Add" class="btn btn-default">
        </div>
    </form>
    @endif

@else
<div class="col-md-12 text-center">
    <h1>Please add room type</h1>
</div>
@endif

@endsection
