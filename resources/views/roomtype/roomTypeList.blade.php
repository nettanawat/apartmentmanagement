
@extends('master')

@section('title', 'Room type list')

@section('content')

@if(Session::has('flash_message'))
<div id="alert" class="alert alert-success">
    {{ Session::get('flash_message') }}
</div>
@endif

<div id="top" class="form-group text-right">
    <a href="/roomtype/add" class="btn btn-default">Add room type</a>
</div>

<table style="margin-top: 10px;" class="table table-striped">
    <tr>
        <th>#</th>
        <th>name</th>
        <th>daily_price</th>
        <th>monthly_price</th>
        <th>action</th>

    </tr>
    @foreach ($roomTypes as $roomType)
    <tr>
        <td>{{$roomType->id}}</td>
        <td>{{$roomType->name}}</td>
        <td>{{$roomType->daily_price}}</td>
        <td>{{$roomType->monthly_price}}</td>
        <td>
            <form action="/roomtype/{{$roomType->id}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                <a style="text-decoration: none" href="/roomtype/{{$roomType->slug}}/edit" class="btn"><span class="glyphicon glyphicon-edit"></span></a>
                <button style="background-color: transparent; border: none" type="submit" id="{{$roomType->id}}" class="deleteBtn" ><span class="glyphicon glyphicon-remove-circle"></span></button>
            </form>
        </td>
    </tr>
@endforeach
</table>
<script type="text/javascript">
    $('#alert').delay(3000).fadeOut()
</script>
@endsection
