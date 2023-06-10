<?php

namespace App\Http\Controllers;

use App\Services\RconService;
use App\Models\User;
use App\Models\WebsiteShopArticles;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ShopController extends Controller
{
    public function __invoke(): View
    {
        return view('shop.shop', ['articles' => WebsiteShopArticles::get()]);
    }

    private function giveBadge(User $user, RconService|null $rcon, string $badges): void {
        if (empty($badges) === true) {
            return;
        }

        if ($rcon !== null) {
            $rcon->giveBadge($user, $badges);
        } else {
            $badges_array = explode(';', $badges);
            $badgesCount = count($badges_array);
            for ($i = 0; $i < $badgesCount; $i++) {
                $user->badges()->updateOrInsert(
                    [
                        'user_id' => $user->id,
                        'badge_code' => $badges_array[$i]
                    ],
                    []
                );
            }
        }
    }

    private function buy(RconService $rcon, int $price, int|null $credits, int|null $duckets, int|null $diamonds, string|null $badges): Response {
        $user = Auth::user();

        if ($user->website_balance < $price) {
            return to_route('shop.index')->withErrors(
                ['message' => __('You do not have enough money!')]
            );
        }

        if ($rcon->isConnected()) {
            if ($credits != null) {
                $rcon->giveCredits($user, $credits);
            }
            if ($duckets != null) {
                $rcon->giveDuckets($user, $duckets);
            }
            if ($diamonds != null) {
                $rcon->giveDiamonds($user, $diamonds);
            }
            if ($badges != null) {
                $this->giveBadge($user, $rcon, $badges);
            }
        } else {
            if ($credits != null) {
                $user->increment('credits', $credits);
            }
            if ($duckets != null) {
                $user->currencies()->where('type', 0)->increment('amount', $duckets); // duckets
            }
            if ($diamonds != null) {
                $user->currencies()->where('type', 5)->increment('amount', $diamonds); // diamonds
            }
            if ($badges != null) {
                $this->giveBadge($user, null, $badges);
            }
        }

        $user->decrement('website_balance', $price);

        return to_route('shop.index')->with('success', __('Successful!'));
    }

    public function buyPackage(RconService $rcon, int $articleId): Response {
        $article = WebsiteShopArticles::where('id', $articleId)->first();
        if ($article === null) {
            return to_route('shop.index')->withErrors(
                ['message' => __('Package does not exist')]
            );
        }

        return $this->buy($rcon, $article->costs, $article->credits, $article->duckets, $article->diamonds, $article->badges);
    }
}