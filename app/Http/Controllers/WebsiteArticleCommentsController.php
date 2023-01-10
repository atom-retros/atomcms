<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCommentFormRequest;
use App\Models\WebsiteArticle;
use App\Models\WebsiteArticleComment;
use Illuminate\Support\Facades\Auth;

class WebsiteArticleCommentsController extends Controller
{
    public function store(WebsiteArticle $article, ArticleCommentFormRequest $request)
    {
        $user = $request->user();
        if ($article->userHasReachedArticleCommentLimit()) {
            return redirect()->back()->withErrors([
                'message' => __('You can only comment :amount times per article', ['amount' => setting('max_comment_per_article')]),
            ]);
        }

        $article->comments()->create([
            'user_id' => $user->id,
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', __('You comment has been posted!'));
    }

    public function destroy(WebsiteArticleComment $comment)
    {
        if (!$comment->userCanDeleteComment()) {
            return redirect()->back()->withErrors([
                'message' => __('You can only delete your own comments'),
            ]);
        }

        $comment->delete();

        return redirect()->back()->with('success', __('You comment has been deleted!'));
    }
}