<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = ArticleResource::collection(Article::with('user')->latest()->take(10)->get());

        return inertia('Article/Index', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
    {
        Article::create([
            ...$request->validated(),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('articles.index')->with([
            'message' => 'Article has been created successfully',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Article/Create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return inertia('Article/Edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleStoreRequest $request, Article $article)
    {
        $article->update($request->validated());

        return redirect()->route('articles.index')->with([
            'message' => 'Article has been updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with([
            'message' => 'Article has been deleted completely',
        ]);
    }
}
