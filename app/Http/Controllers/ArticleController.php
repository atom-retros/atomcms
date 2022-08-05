<?php

namespace App\Http\Controllers;

use App\Models\WebsiteArticle;

class ArticleController extends Controller
{
    public function show(WebsiteArticle $article)
    {
        return view('community.article', [
            'article' => $article->load('user.permission:id,rank_name'),
            'otherArticles' => WebsiteArticle::query()->whereNot('slug', $article->slug)->latest()->get(),
        ]);
    }
}