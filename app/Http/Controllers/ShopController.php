<?php

namespace App\Http\Controllers;

use App\Actions\SendCurrency;
use App\Actions\SendFurniture;
use App\Services\RconService;
use App\Models\User;
use App\Models\WebsiteShopArticles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ShopController extends Controller
{
    public function __invoke()
    {
        return view('shop.shop', [
            'articles' => WebsiteShopArticles::orderBy('position')->with(['rank:id,rank_name', 'features'])->get(),
            'rconConnected' => app(RconService::class)->isConnected
        ]);
    }

    private function giveBadges(User $user, string $badges)
    {
        $badgeList = explode(';', $badges);
        if (empty($badgeList)) {
            return;
        }

        $rcon = app(RconService::class);
        if (!$rcon->isConnected) {
            foreach ($badgeList as $badge) {
                $user->badges()->updateOrCreate([
                    'user_id' => $user->id,
                    'badge_code' => $badge,
                ]);
            }

            return;
        }

        foreach ($badgeList as $badge) {
            if ($rcon->isConnected) {
                $rcon->giveBadge($user, $badge);
            }
        }
    }

    public function purchase(WebsiteShopArticles $package, SendCurrency $sendCurrency): Response {
        $user = Auth::user();

        if ($package->give_rank !== 0 && $user->rank >= $package->give_rank) {
            return to_route('shop.index')->withErrors(
                ['message' => __('You are already this or a higher rank')],
            );
        }        

        if ($user->website_balance < $package->price()) {
            return to_route('shop.index')->withErrors(
                ['message' => __('You need to top-up your account with another $:amount to purchase this package', ['amount' => ($package->price() - $user->website_balance)])],
            );
        }

        $rcon = app(RconService::class);
        if (!$rcon->isConnected && $user->online === '1') {
            return to_route('shop.index')->withErrors(
                ['message' => __('Pleaase logout before purchasing a package')],
            );
        }

        DB::transaction(function () use ($user, $rcon, $package, $sendCurrency) {
            $user->decrement('website_balance', $package->price());
        
            $sendCurrency->execute($user, 'credits', $package->credits);
            $sendCurrency->execute($user, 'duckets', $package->duckets);
            $sendCurrency->execute($user, 'diamonds', $package->diamonds);
        
            if ($package->give_rank !== 0) { // Check if give_rank is not zero
                if ($rcon->isConnected) {
                    $rcon->setRank($user, $package->give_rank);
                    $rcon->disconnectUser($user);
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
        });        

        return to_route('shop.index')->with('success', __('Successful!'));
    }

    public function handleFurniture(array $furniture)
    {
        $sendFurniture = app(SendFurniture::class);

        $sendFurniture->execute(Auth::user(), $furniture);
    }
}
