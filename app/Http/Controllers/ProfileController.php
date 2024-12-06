<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Article;
use App\Models\Category;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function showAdminDashboard()
    {
        $categories = Category::all();
        return view('admin.categories.categories', compact('categories'));
    }

    public function showHomepage()
    {
        $articles = Article::all();

        return view('homepage', ['articles' => $articles]);
    }

    public function articleById($id)
    {
        // Find the article by its ID
        $article = Article::findOrFail($id);

        // Return the article view with the article data
        return view('article', ['article' => $article]);
    }

    public function nextArticle($id)
    {
        // Find the current article by ID
        $currentArticle = Article::findOrFail($id);

        // Get the next article based on the current article's ID
        // Assuming the next article is the one with a higher ID
        $nextArticle = Article::where('id', '>', $currentArticle->id)
            ->orderBy('id', 'asc') // Ordering by ID to get the next one
            ->first();

        if ($nextArticle) {
            return redirect()->route('articleById', ['id' => $nextArticle->id]); // Pass the next article to the view
        }

        return redirect()->route('homepage')->with('error', 'No more articles'); // Redirect if no article is found
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
