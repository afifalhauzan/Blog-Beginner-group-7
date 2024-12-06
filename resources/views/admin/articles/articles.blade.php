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
                <h1 class="text-3xl font-bold mb-6">Articles</h1>
                <a href="{{ route('admin.articles.create') }}" class="bg-blue-500 text-white p-2 px-4 rounded mb-6 inline-block">Create Article</a>
            </div>
            <div class="">
                @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                    {{ session('success') }}
                </div>
                @endif
                <table class="min-w-full table-auto shadow-md">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">Title</th>
                            <th class="border px-4 py-2">Category</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td class="border px-4 py-2">{{ $article->title }}</td>
                            <td class="border px-4 py-2">{{ $article->category->name ?? 'No Category' }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="inline-block">
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
</body>

</html>