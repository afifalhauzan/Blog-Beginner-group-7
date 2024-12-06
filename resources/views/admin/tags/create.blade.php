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
    <!-- Sidebar and Content Layout -->
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white min-h-screen p-4">
            <div class="space-y-4">
                <h2 class="text-xl font-bold">Admin Panel</h2>
                <ul>
                    <li><a href="{{ route('admin.categories') }}" class="block py-2 hover:bg-gray-700 rounded">Manage Categories</a></li>
                    <li><a href="{{ route('admin.tags') }}" class="block py-2 hover:bg-gray-700 rounded">Manage Tags</a></li>
                    <li><a href="{{ route('admin.articles') }}" class="block py-2 hover:bg-gray-700 rounded">Manage Articles</a></li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-4">Create Tag</h1>
            <form action="{{ route('admin.tags.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <!-- Tag Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700">Tag Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4 flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Create Tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>