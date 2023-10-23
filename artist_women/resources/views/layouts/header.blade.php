<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href={{ asset('css/bootstrap.min.css') }} rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap-icons-1.11.1/bootstrap-icons.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> --}}
    {{-- <link href={{ asset("img/musiclife1.png") }} rel="icon shortcut"> --}}
    <link rel="stylesheet" href={{ asset('index.css') }}>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <title>
        @yield('title')
    </title>
</head>
