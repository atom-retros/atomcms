<?php

namespace App\Http\Controllers;

use App\Models\WebsiteArticle;
use App\Models\WebsiteArticleReaction;
use Illuminate\Http\Request;

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
            'article' => $article->load(['user.permission:id,rank_name,staff_background', 'reactions', 'reactions.user:id,username,look']),
            'otherArticles' => WebsiteArticle::query()->whereNot('slug', $article->slug)->latest('id')->take(15)->get(),
        ]);
    }

    public function addReaction(WebsiteArticle $article, Request $request)
    {
        $reaction = $request->get('reaction');

        if(!$reaction || !in_array($reaction, config('habbo.reactions'))) {
            return response()->json(['success' => false]);
        }

        $existingReaction = WebsiteArticleReaction::where('user_id', auth()->id())
            ->where('article_id', $article->id)
            ->where('reaction', $reaction)
            ->first();

        if($existingReaction) {
            $existingReaction->update(['active' => !$existingReaction->active]);
        } else {
            $article->reactions()->create([
                'reaction' => $reaction,
            ]);
        }

        return response()->json([
            'success' => true,
            'added' => $existingReaction ? $existingReaction->active : true,
        ]);
    }
}
