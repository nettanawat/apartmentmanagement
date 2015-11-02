
@extends('master')

@section('title', 'Room list')

@section('content')
<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>name</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>room_type_id</th>
    </tr>

@foreach ($rooms as $room)
<tr>
    <td>{{$room->id}}</td>
    <td>{{$room->name}}</td>
    <td>{{$room->created_at}}</td>
    <td>{{$room->updated_at}}</td>
    <td>{{$room->roomType->name}}</td>
</tr>
@endforeach
</table>

@endsection
