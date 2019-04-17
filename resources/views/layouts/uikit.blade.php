<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/uikit.min.css')}}" />
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset ('js/uikit-icons.min.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @yield('style')
    <style>
        body{
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>