<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="{!! asset('css/app.css') !!}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
</head>
<body>
    @include('menu')

    <div class="container-fluid">
        @yield('content')
    </div>

</body>
</html>