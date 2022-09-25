<?php

namespace App\Http\Controllers;

use App\Models\WebsiteArticle;

class ArticleController extends Controller
{
    public function index()
    {
        return view('community.articles', [
            'articles' => WebsiteArticle::query()
                ->latest('id')
                ->paginate(8),
        ]);
    }

    public function show(WebsiteArticle $article)
    {
        return view('community.article', [
            'article' => $article->load('user.permission:id,rank_name,staff_background'),
            'otherArticles' => WebsiteArticle::query()->whereNot('slug', $article->slug)->latest('id')->take(15)->get(),
        ]);
    }
}