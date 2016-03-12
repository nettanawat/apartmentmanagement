
@extends('master')

@section('title', 'Customers')

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

<div class="col-md-12 form-inline text-center">
    <div style="width: 30px; height: 30px; background-color: #c9302c" class="form-control"></div>
    <div class="form-group"><strong>Not available</strong></div>
    <div style="width: 30px; height: 30px; background-color: #5cb85c; margin-left: 50px;" class="form-control"></div>
    <div class="form-group"><strong>Available</strong></div>
</div>

<div class="col-md-12 form-inline">
    <form class="form-group col-md-6" method="get" action="/rental/check-in/filter/{slug}">
        <label>Filter by: </label>
        <select name="roomType" class="form-control">
            <option value="all">All room types</option>
            @foreach($roomTypes as $roomType)
                <option value="{{$roomType->id}}">{{$roomType->name}}</option>
            @endforeach
        </select>
    </form>
</div>

@foreach($floors as $floor)
<div class="col-md-12">
    <h2>{{$floor->name}}</h2>
    @foreach($rooms as $room)
        @if($room->floor_id == $floor->id)
            @if($room->is_available == true)
                <div class="col-md-1 col-sm-3 form-group text-center">
                    <a href="check-in/addcustomer/{{$room->slug}}" class="btn btn-success">{{$room->name}}</a>
                    <p>{{$room->roomType->name}}</p>
                </div>
            @else
                <div class="col-md-1 col-sm-3 form-group text-center"  data-toggle="tooltip" data-placement="top" title="This room is not available">
                    <a style="pointer-events: none; cursor: default;" href="#" class="btn btn-danger">{{$room->name}}</a>
                    <p>{{$room->roomType->name}}</p>
                </div>
            @endif
        @endif
    @endforeach
</div>
<hr class="col-md-12">
@endforeach

<script type="text/javascript">
    $('#alert').delay(3000).fadeOut()

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


</script>
@endsection
