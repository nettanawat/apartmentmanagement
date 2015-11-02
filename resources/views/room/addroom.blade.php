@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/room" method="POST">
    <input type="text" name="name">
    <input type="text" name="roomType">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="Add">
</form>