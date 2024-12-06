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
            <h1 class="text-3xl font-bold mb-4">Edit Article</h1>
            <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="full_text" class="block text-sm font-semibold text-gray-700">Full Text</label>
                        <textarea name="full_text" id="full_text" rows="4" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('full_text', $article->full_text) }}</textarea>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-700">Image (Max 2MB)</label>
                        @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" class="w-32 h-32 object-cover mb-4">
                        @endif
                        <input type="file" name="image" id="image" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-700">Category</label>
                        <select name="category_id" id="category_id" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $article->category_id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 pb-2">Tags</label>
                        @foreach($tags as $tag)
                        <div class="flex items-center mb-2">
                            <!-- Check if the tag is already associated with the article -->
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag_{{ $tag->id }}" class="mr-2"
                                @if($article->tags->contains($tag->id)) checked @endif>
                            <label for="tag_{{ $tag->id }}" class="text-sm text-gray-700">{{ $tag->name }}</label>
                        </div>
                        @endforeach
                    </div>


                    <div class="mt-4 flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Update Article</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>