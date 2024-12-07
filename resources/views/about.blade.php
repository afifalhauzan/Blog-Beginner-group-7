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
    <div class="container mx-auto px-6 py-12">
        <!-- About Us Section -->
        <h1 class="font-bold text-3xl text-center text-blue-500 mb-8">About Us</h1>

        <div class="flex justify-center gap-12">
            <!-- Person 1 -->
            <div class="text-center">
                <img src="{{asset('images/apip.jpg')}}" alt="Person 1" class="w-32 h-32 rounded-full mx-auto mb-4 shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800">Person 1</h3>
                <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.</p>
            </div>

            <!-- Person 2 -->
            <div class="text-center">
                <img src="{{asset('images/ucup.jpg')}}" alt="Person 2" class="w-32 h-32 rounded-full mx-auto mb-4 shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800">Person 2</h3>
                <p class="text-gray-600 mt-2">Suspendisse potenti. Curabitur blandit tempus porttitor. Vivamus sagittis lacus vel augue.</p>
            </div>

            <!-- Person 3 -->
            <div class="text-center">
                <img src="{{asset('images/sasa.jpg')}}" alt="Person 3" class="w-32 h-32 rounded-full mx-auto mb-4 shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800">Person 3</h3>
                <p class="text-gray-600 mt-2">Donec ullamcorper nulla non metus auctor fringilla. Curabitur blandit tempus porttitor.</p>
            </div>
        </div>
    </div>

    @include('footer')
</body>

</html>
