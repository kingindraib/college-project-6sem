<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $settings->site_title }} - @yield('title')</title>
    
    @include('home.includes.css')

</head>
<body>

    @include('home.includes.header')

    @yield('body')
    
@include('home.includes.footer')
@include('home.includes.js')


</body>
</html>