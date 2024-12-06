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

    <div class="container mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-4">Articles</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($articles as $article)
            <div class="p-4 bg-white shadow rounded-lg hover:shadow-lg transform hover:-translate-y-2 transition duration-300 hover:text-blue-700 space-y-4">
                <!-- Image -->
                <div class="relative rounded-lg pb-2">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="rounded-lg">
                    <!-- Title on Image -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent flex items-end p-4 pb-2 rounded-lg">
                        <h2 class="text-lg font-bold text-white">{{ $article->title }}</h2>
                    </div>
                </div>

                <div>
                    <p class="text-gray-600">{{ Str::limit($article->full_text, 120) }}</p>
                    <a href="{{ route('articleById', ['id' => $article->id]) }}" class="block text-right text-blue-500 hover:underline">Read more</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('footer')
</body>

</html>