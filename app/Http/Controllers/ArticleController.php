<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Services\UploadService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    protected $article;
    protected $uploadService; // Add UploadService

    public function __construct(Article $article, UploadService $uploadService)
    {
        $this->article = $article;
        $this->uploadService = $uploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Article::class);

        $articles = $this->article->all();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        // Handle uploaded image
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadService->handleUploadedFile($request->file('image'), 'images/articles');

            $validated['image'] = $imagePath;
        }

        // Example: Save the article to the database
        $article = Auth::user()->articles()->create($validated);

        // Flash a success message if the article was successfully saved
        Session::flash('success', 'Article created successfully.');

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validated = $request->validated();

        // Handle updated image
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadService->handleUpdatedFile(
                $request->file('image'),
                $article->image, // Current image path in database
                'images/articles', // Directory to store images
                'public' // Disk to store images
            );
            $validated['image'] = $imagePath;
        }

        // Update the article with validated data
        $article->update($validated);

        // Flash a success message if the article was successfully updated
        Session::flash('success', 'Article updated successfully.');

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Delete associated image file
        $this->uploadService->deleteFile($article->image, 'public');

        // Delete the article
        $article->delete();

        // Flash a success message if the article was successfully deleted
        Session::flash('success', 'Article deleted successfully.');

        return redirect()->route('articles.index');
    }
}
