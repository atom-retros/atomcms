<?php

namespace App\Http\Controllers;

use App\Models\WebsiteArticle;
use App\Models\WebsiteArticleReaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('community.articles', [
            'articles' => WebsiteArticle::with(['user:id,username,look'])
                ->orderByDesc('id')
                ->paginate(8),
        ]);
    }

    public function show(WebsiteArticle $article): View
    {
        $myReactions = [];
        $articleData = $article->load(['user.permission:id,rank_name,staff_background', 'reactions:article_id,user_id,reaction', 'reactions.user:id,username', 'comments.user:id,username,look']);

        if (Auth::check()) {
            $myReactions = $articleData->reactions->where('user_id', Auth::user()->current_user_id)->pluck('reaction');
        }

        return view('community.article', [
            'article' => $articleData,
            'otherArticles' => WebsiteArticle::whereNot('slug', $article->slug)->latest('id')->take(15)->get(),
            'myReactions' => $myReactions,
            'articleReactions' => collect($article->reactions)->groupBy('reaction', true),
        ]);
    }

    public function toggleReaction(WebsiteArticle $article, Request $request): JsonResponse
    {
        $reaction = $request->get('reaction');

        if (! is_string($reaction) || ! in_array($reaction, config('habbo.reactions'))) {
            return response()->json(['success' => false]);
        }

        $existingReaction = WebsiteArticleReaction::getReaction($article->id, Auth::user()->current_user_id, $reaction);

        if ($existingReaction) {
            $existingReaction->update(['active' => ! $existingReaction->active]);
        } else {
            $article->reactions()->create([
                'reaction' => $reaction,
            ]);
        }

        return response()->json([
            'success' => true,
            'added' => $existingReaction?->active ?? true,
            'username' => Auth::user()->currentUser->username,
        ]);
    }
}
