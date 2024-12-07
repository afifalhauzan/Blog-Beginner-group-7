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
        <h1 class="font-bold text-3xl text-center text-blue-500 mb-8">MEMBER</h1>

        <div class="flex justify-center gap-12">
            <!-- Person 1 -->
            <div class="text-center">
                <img src="{{asset('images/apip.jpg')}}" alt="Apip" class="w-44 h-44 rounded-full mx-auto mb-4 shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800">Afiif</h3>
                <p class="text-gray-600 mt-2">NIM : 235150601111031</p>
                <p class="text-gray-600 mt-2">Specialization : Web Programming</p>
            </div>

            <!-- Person 2 -->
            <div class="text-center">
                <img src="{{asset('images/ucup ganteng.jpg')}}" alt="Ucup" class="w-44 h-44 rounded-full mx-auto mb-4 shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800">Yusuf</h3>
                <p class="text-gray-600 mt-2">NIM : 235150601111032</p>
                <p class="text-gray-600 mt-2">Specialization : Computer Network</p>
            </div>

            <!-- Person 3 -->
            <div class="text-center">
                <img src="{{asset('images/sasa.jpg')}}" alt="Sasa" class="w-44 h-44 rounded-full mx-auto mb-4 shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800">Khansa</h3>
                <p class="text-gray-600 mt-2">NIM : 235150607111027</p>
                <p class="text-gray-600 mt-2">Specialization : Database</p>
            </div>
        </div>
    </div>

    @include('footer')
</body>

</html>
