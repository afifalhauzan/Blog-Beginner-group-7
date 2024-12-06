<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        // Retrieve all tags
        $tags = Tag::all();
        return view('admin.tags.tags', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        // Create a new tag
        Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.tags')->with('success', 'Tag created successfully!');
    }

    public function edit($id)
    {
        // Retrieve the tag to edit
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $id,
        ]);

        // Find the tag and update
        $tag = Tag::findOrFail($id);
        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.tags')->with('success', 'Tag updated successfully!');
    }

    public function destroy($id)
    {
        // Find the tag and delete
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('admin.tags')->with('success', 'Tag deleted successfully!');
    }
}
