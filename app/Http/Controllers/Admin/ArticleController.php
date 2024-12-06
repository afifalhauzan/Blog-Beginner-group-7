<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class ArticleController extends Controller
{ // Show all articles
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.articles', compact('articles'));
    }

    // Show form to create an article
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();  // Fetch all tags
        return view('admin.articles.create', compact('categories', 'tags'));
    }

    // Store the new article
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'full_text' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        $article = Article::create([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'image' => $imagePath,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
        ]);

        if ($request->has('tags')) {
            $article->tags()->attach($request->input('tags')); // Attach the selected tags
        }

        return redirect()->route('admin.articles')->with('success', 'Article created successfully!');
    }

    // Show form to edit an article
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();  // Fetch all tags
        return view('admin.articles.edit', compact('article', 'categories', 'tags'));
    }

    // Update the article
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'full_text' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|array', // Validate that tags are an array
            'tags.*' => 'exists:tags,id', // Ensure each tag id exists in the tags table
        ]);

        $article = Article::findOrFail($id);

        // Handle the image upload (if new image is uploaded)
        if ($request->hasFile('image')) {
            // Delete old image
            if ($article->image && Storage::exists('public/' . $article->image)) {
                Storage::delete('public/' . $article->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $article->image; // Keep the old image if not updating
        }

        $article->update([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'image' => $imagePath,
            'category_id' => $request->category_id,
        ]);

        if ($request->has('tags')) {
            $article->tags()->sync($request->tags); // Sync ensures the tags are updated properly
        }

        return redirect()->route('admin.articles')->with('success', 'Article updated successfully!');
    }

    // Delete the article
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Delete the image if it exists
        if ($article->image && Storage::exists('public/' . $article->image)) {
            Storage::delete('public/' . $article->image);
        }

        $article->delete();

        return redirect()->route('admin.articles')->with('success', 'Article deleted successfully!');
    }
}
