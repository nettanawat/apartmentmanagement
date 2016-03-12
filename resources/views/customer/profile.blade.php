@extends('master')

@section('title', 'Profile')

@section('content')

<div class="container">
    <div class="form-group col-md-12">
        <h3>Customer information</h3>
    </div>
    <div class="form-group col-md-6">
        <label>First Name</label>
        <input type="text" name="first_name" class="form-control" required value="{{$customer->first_name}}">
    </div>
    <div class="form-group col-md-6">
        <label>Last Name</label>
        <input type="text" name="last_name" class="form-control" required value="{{$customer->last_name}}">
    </div>
    <div class="form-group col-md-6">
        <label>Citizen Id</label>
        <input type="text" name="citizen_id" class="form-control" required value="{{$customer->citizen_id}}">
    </div>
    <div class="form-group col-md-6">
        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control" required value="{{$customer->date_of_birth}}">
    </div>
    <div class="form-group col-md-6">
        <label>Telephone Number</label>
        <input type="text" name="telephone_number" class="form-control" value="{{$customer->telephone_number}}">
    </div>
    <div class="form-group col-md-6">
        <label>Phone Number</label>
        <input type="text" name="phone_number" class="form-control" required value="{{$customer->phone_number}}">
    </div>
    <div class="form-group col-md-6">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required value="{{$customer->email}}">
    </div>
    <hr class="col-md-12">
    <div class="form-group col-md-12">
        <h3>Customer address</h3>
    </div>
    <div class="form-group col-md-6">
        <label>Address Line 1</label>
        <input type="text" name="address_line1" class="form-control" required value="{{$customer->address->address_line1}}">
    </div>
    <div class="form-group col-md-6">
        <label>Address Line 2</label>
        <input type="text" name="address_line2" class="form-control" value="{{$customer->address->address_line2}}">
    </div>
    <div class="form-group col-md-6">
        <label>City</label>
        <input type="text" name="city" class="form-control" required value="{{$customer->address->city}}">
    </div>
    <div class="form-group col-md-6">
        <label>Province</label>
        <input type="text" name="province" class="form-control" value="{{$customer->address->province}}">
    </div>
    <div class="form-group col-md-6">
        <label>Post Code</label>
        <input type="text" name="post_code" class="form-control" value="{{$customer->address->post_code}}">
    </div>
    <div class="form-group col-md-12">
        <a href="/customer" class="btn btn-default">Back</a>
    </div>
</div>

@endsection
