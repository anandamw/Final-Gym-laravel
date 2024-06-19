<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('') }}assets_users/css/navbar.css">
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

    @include('users.layouts.navbar')

    @yield('content')



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="{{ asset('') }}assets_users/js/navbar.js"></script>
</body>

</html>
