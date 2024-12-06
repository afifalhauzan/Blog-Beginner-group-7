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
        <div class="flex flex-wrap items-center space-y-4 md:space-y-0 justify-between">
            <!-- Left Content (Text) -->
            <div class="flex-1 space-y-4 pr-14">
                <a href="javascript:history.back()" class="text-blue-500 hover:underline flex items-center">
                    <!-- Back Arrow Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali
                </a>

                <!-- Title -->
                <h1 class="text-4xl font-bold mb-4 text-left break-words">
                    {{ $article->title }}
                </h1>

                <!-- Category -->
                <div class="bg-gray-200 rounded-lg inline-block">
                    <h1 class="text-md font-sans py-1 text-left p-2">
                        <p>{{ $article->category_id ? $article->category->name : 'No category assigned' }}</p>
                    </h1>
                </div>
            </div>

            <!-- Right Content (Image) -->
            <div class="rounded-lg overflow-hidden w-96 h-48 flex-shrink-0">
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
            </div>
        </div>

        <div class="py-2">
            <p class="text-gray-500">By {{$article->user->name}} | {{ $article->created_at->format('F j, Y') }}</p>
        </div>


        <div class="grid grid-cols-3 gap-4 py-6">
            <!-- Full Text Section (2/3 width) -->
            <div class="col-span-2">
                <div class="py-6 pt-2">
                    <p class="text-gray-600">{!! nl2br(e($article->full_text)) !!}</p>
                </div>

                <div class="flex justify-between">
                    <!-- Back Button -->
                    <a href="javascript:history.back()" class="text-blue-500 hover:underline flex items-center">
                        <!-- Back Arrow Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Kembali
                    </a>

                    <!-- Next Button -->
                    <a href="{{ route('nextArticle', $article->id) }}" class="text-blue-500 hover:underline flex items-center">
                        Selanjutnya
                        <!-- Forward Arrow Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tags Section (1/3 width) -->
            <div class="col-span-1 bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @if ($article->tags->isEmpty())
                        <p class="text-sm text-gray-500">There are no tags!</p>
                    @else
                    @foreach ($article->tags as $tag)
                    @php
                    $colors = ['bg-red-200', 'bg-green-200', 'bg-blue-200', 'bg-blue-300'];
                    $color = $colors[array_rand($colors)];
                    @endphp
                    <span class="px-3 py-1 text-sm font-medium text-gray-700 {{ $color }} rounded-lg">
                        {{ $tag->name }}
                    </span>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>

    @include('footer')
</body>

</html>