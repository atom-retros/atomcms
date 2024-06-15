<?php

namespace App\Http\Controllers\Shop;

use App\Actions\SendCurrency;
use App\Actions\SendFurniture;
use App\Http\Controllers\Controller;
use App\Models\Shop\WebsiteShopArticle;
use App\Models\Shop\WebsiteShopCategory;
use App\Models\User;
use App\Services\RconService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ShopController extends Controller
{
    private RconService $rconService;

    public function __construct(RconService $rconService)
    {
        $this->rconService = $rconService;
    }

    public function __invoke(WebsiteShopCategory|null $category)
    {
        $packages = WebsiteShopArticle::orderBy('position');

        if ($category && $category->exists) {
            $packages = $category->articles()->orderBy('position');
        }

        return view('shop.shop', [
            'articles' => $packages->with(['rank:id,rank_name', 'features'])->get(),
            'categories' => WebsiteShopCategory::whereHas('articles')->get(),
        ]);
    }

    private function giveBadges(User $user, string $badges)
    {
        $badgeList = explode(';', $badges);
        $ownedBadges = $user->badges()->pluck('badge_code')->toArray();

        foreach ($badgeList as $badge) {
            if (in_array($badge, $ownedBadges)) {
                continue;
            }

            if ($this->rconService->isConnected) {
                $this->rconService->giveBadge($user, $badge);

                continue;
            }

            $user->badges()->updateOrCreate([
                'user_id' => $user->id,
                'badge_code' => $badge,
            ]);
        }
    }

    public function purchase(WebsiteShopArticle $package, SendCurrency $sendCurrency): Response {
        $user = Auth::user();
        if ($package->give_rank && $user->rank >= $package->give_rank) {
            return to_route('shop.index')->withErrors(
                ['message' => __('You are already this or a higher rank')],
            );
        }

        if (!$this->rconService->isConnected && Auth::user()->online === '1') {
            return to_route('shop.index')->withErrors(
                ['message' => __('Please logout before purchasing a package')],
            );
        }

        if ($user->website_balance < $package->price()) {
            return to_route('shop.index')->withErrors(
                ['message' => __('You need to top-up your account with another $:amount to purchase this package', ['amount' => ($package->price() - $user->website_balance)])],
            );
        }

        $user->decrement('website_balance', $package->price());

        $sendCurrency->execute($user, 'credits', $package->credits);
        $sendCurrency->execute($user, 'duckets', $package->duckets);
        $sendCurrency->execute($user, 'diamonds', $package->diamonds);

        if ($package->give_rank) {
            if ($this->rconService->isConnected) {
                $this->rconService->setRank($user, $package->give_rank);
                $this->rconService->disconnectUser($user);
            } else {
                $user->update([
                    'rank' => $package->give_rank,
                ]);
            }
        }

        if ($package->badges) {
            $this->giveBadges($user, $package->badges);
        }

        if ($package->furniture) {
            $this->handleFurniture(json_decode($package->furniture, true));
        }

        return to_route('shop.index')->with('success', __('Successful!'));
    }

    public function handleFurniture(array $furniture)
    {
        $sendFurniture = app(SendFurniture::class);

        $sendFurniture->execute(Auth::user(), $furniture);
    }
}
