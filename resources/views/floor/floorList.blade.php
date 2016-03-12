
@extends('master')

@section('title', 'Customers')

@section('content')

@if(Session::has('flash_message'))
<div id="alert" class="alert alert-success">
    {{ Session::get('flash_message') }}
</div>
@endif
<div class="form-group text-right">
    <a href="/floor/add" class="btn btn-default">Add floor</a>
</div>
<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>name</th>
        <th>created_date</th>
        <th>updated_at</th>
        <th>action</th>
    </tr>

    @foreach ($floors as $floor)
    <tr>
        <td>{{$floor->id}}</td>
        <td>{{$floor->name}}</td>
        <td>{{$floor->created_at}}</td>
        <td>{{$floor->updated_at}}</td>
        <td>
            <form action="/floor/{{$floor->id}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                <a style="text-decoration: none" href="/floor/{{$floor->slug}}/edit" class="btn"><span class="glyphicon glyphicon-edit"></span></a>
                <button style="background-color: transparent; border: none" type="submit" id="{{$floor->id}}" class="deleteBtn" ><span class="glyphicon glyphicon-remove-circle"></span></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>


<script type="text/javascript">
    $('#alert').delay(3000).fadeOut()
</script>
@endsection
