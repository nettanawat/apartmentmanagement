
@extends('master')

@section('title', 'Room list')

@section('content')

@if(Session::has('flash_message'))
<div id="alert" class="alert alert-success">
    {{ Session::get('flash_message') }}
</div>
@endif

<div class="form-group text-right">
    <a href="/room/add" class="btn btn-default">Add room</a>
</div>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>name</th>
        <th>room_type</th>
        <th>room_floor</th>
        <th>max_customer</th>
        <th>daily_price</th>
        <th>monthly_price</th>
        <th>is_available</th>
        <th>action</th>
    </tr>

@foreach ($rooms as $room)
<tr>
    <td>{{$room->id}}</td>
    <td>{{$room->name}}</td>
    <td>{{$room->roomType->name}}</td>
    @if($room->floor_id == null)
    <td> - </td>
    @else
    <td>{{$room->floor->name}}</td>
    @endif
    <td>{{$room->max_customer}}</td>
    <td>{{$room->roomType->daily_price}}</td>
    <td>{{$room->roomType->monthly_price}}</td>
    @if($room->is_available == 1)
    <td>true</td>
    @else
    <td>false</td>
    @endif
    <td>
        <form action="/room/{{$room->id}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <a style="text-decoration: none" href="/room/{{$room->slug}}/edit" class="btn"><span class="glyphicon glyphicon-edit"></span></a>
            <button style="background-color: transparent; border: none" type="submit" id="{{$room->id}}" class="deleteBtn" ><span class="glyphicon glyphicon-remove-circle"></span></button>
        </form>
    </td>
</tr>
@endforeach
</table>
<script type="text/javascript">
    $('#alert').delay(3000).fadeOut()
</script>
@endsection
