
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
<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading col-md-6"><h3>Room <strong>{{$room->name}}</strong></h3></div>
        <div class="panel-heading col-md-6"><h3><strong>{{$room->roomType->name}}</strong></h3></div>
        <div class="panel-body">
            <h4>Room detail</h4>
            <div class="col-md-6">
                <li><label>Max customer : {{$room->max_customer}} </label></li>
                <li><label>Daily price : {{$room->roomType->daily_price}} </label></li>
                <li><label>Monthly price : {{$room->roomType->monthly_price}} </label></li>
            </div>
            <div class="col-md-6">
                <li><label>Room floor : {{$room->floor->name}} </label></li>
                <li><label>Description : {{$room->description}} </label></li>
            </div>
    </div>

    <div class="col-md-12">
        <h3>Select existing customer</h3><button class="btn btn-default">Select customer</button>
        <hr class="col-md-12">
    </div>
        <div class="col-md-12">
            <form action="/rental/check-in" method="POST" class="container">
                <div class="form-group col-md-12">
                    <h3>Customer information</h3>
                </div>
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Citizen Id</label>
                    <input type="text" name="citizen_id" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Telephone Number</label>
                    <input type="text" name="telephone_number" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <hr class="col-md-12">
                <div class="form-group col-md-12">
                    <h3>Customer address</h3>
                </div>
                <div class="form-group col-md-6">
                    <label>Address Line 1</label>
                    <input type="text" name="address_line1" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Address Line 2</label>
                    <input type="text" name="address_line2" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Province</label>
                    <input type="text" name="province" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Post Code</label>
                    <input type="text" name="post_code" class="form-control">
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="room_id" value="{{ $room->id }}">
                <div class="form-group col-md-12">
                    <input type="submit" value="Back" class="btn btn-default">
                    <input type="submit" value="Submit" class="btn btn-default">
                </div>
            </form>
        </div>
</div>

@endsection