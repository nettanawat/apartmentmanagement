@extends('master')

@section('title', 'Add customer')

@section('content')

@if(Session::has('flash_message'))
<div id="alert" class="alert alert-success">
    {{ Session::get('flash_message') }}
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(isset($customer))

<form action="/customer/{{$customer->id}}" method="POST" class="container">
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
        <input type="text" name="address_line1" class="form-control" required
               value="{{$customer->address->address_line1}}">
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
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group col-md-12">
        <a href="/customer" class="btn btn-default">Back</a>
        <input type="submit" value="Submit" class="btn btn-default">
    </div>
</form>
@else
<form action="/customer" method="POST" class="container">
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

    <div class="form-group col-md-12">
        <input type="submit" value="Back" class="btn btn-default">
        <input type="submit" value="Submit" class="btn btn-default">
    </div>
</form>
@endif
<script type="text/javascript">
    $('#alert').delay(3000).fadeOut()
</script>
@endsection
