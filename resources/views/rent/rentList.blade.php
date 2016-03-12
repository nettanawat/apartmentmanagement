
@extends('master')

@section('title', 'Rental list')

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

<h1>Yeah</h1>

<script type="text/javascript">
    $('#alert').delay(3000).fadeOut()
</script>
@endsection
