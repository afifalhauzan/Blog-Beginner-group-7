<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="font-sans antialiased bg-gray-50">
    @include('navigation')
    <h1> anjay admint udah datang</h1>
    <!-- Include image -->
    <img src="{{ asset('images/download.jpg') }}" alt="Download Image" class="mx-auto mt-4">

</body>

</html>