<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::published()
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('articles_page', compact('articles'));
    }

    public function show(Article $article)
    {
        // Check if article is published
        if (!$article->is_published || 
            !$article->published_at || 
            $article->published_at > now()) {
            abort(404);
        }

        // Get related articles (same category or recent)
        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('article_details', compact('article', 'relatedArticles'));
    }

    // Method for getting articles section on homepage
    public function getLatestArticles($limit = 6)
    {
        return Article::published()
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }
}