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
            <div class="flex justify-between">
                <h1 class="text-3xl font-bold mb-6">Tags</h1>
                <a href="{{ route('admin.tags.create') }}" class="bg-blue-500 text-white p-2 px-4 rounded mb-6 inline-block">Add Tags</a>
            </div>
            
            <!-- Categories List -->
            <div class="bg-white shadow-md rounded-lg">
                @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Categories Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 text-left">Tags Name</th>
                                <th class="px-4 py-2 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $tag->name }}</td>
                                <td class="px-4 py-2 text-right">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.tags.edit', $tag->id) }}" class="text-blue-500 hover:underline mr-4">Edit</a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>