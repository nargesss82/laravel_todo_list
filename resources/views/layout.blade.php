<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','ToDo List')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">

<!-- هدر -->
@include('tasks.header')
<!-- محتوای صفحه -->
@yield('content')
<!-- فوتر -->
@include('footer')

</body>
</html>
