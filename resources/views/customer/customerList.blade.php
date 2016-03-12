
@extends('master')

@section('title', 'Customers')

@section('content')

@if(Session::has('flash_message'))
<div id="alert" class="alert alert-success">
    {{ Session::get('flash_message') }}
</div>
@endif

<div id="top" class="form-group text-right">
    <a href="/customer/add" class="btn btn-default">Add customer</a>
</div>
<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>citizen_id</th>
        <th>telephone_number</th>
        <th>phone_number</th>
        <th>email</th>
        <th>created_date</th>
        <th>updated_date</th>
        <th>action</th>
    </tr>

    @foreach ($customers as $customer)
    <tr id="customer{{$customer->id}}">
        <td>{{$customer->id}}</td>
        <td><a href="/customer/{{$customer->slug}}">{{$customer->first_name}}</a></td>
        <td>{{$customer->last_name}}</td>
        <td>{{$customer->citizen_id}}</td>
        <td>{{$customer->telephone_number}}</td>
        <td>{{$customer->phone_number}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->created_at}}</td>
        <td>{{$customer->updated_at}}</td>
        <td>
            <form action="/customer/{{$customer->id}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                <a style="text-decoration: none" href="/customer/{{$customer->slug}}/edit" class="btn"><span class="glyphicon glyphicon-edit"></span></a>
                <button style="background-color: transparent; border: none" type="submit" id="{{$customer->id}}" class="deleteBtn" ><span class="glyphicon glyphicon-remove-circle"></span></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<script type="text/javascript">
    $('#alert').delay(3000).fadeOut()
</script>
@endsection
