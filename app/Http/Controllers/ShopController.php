<?php

namespace App\Http\Controllers;

use App\Actions\SendCurrency;
use App\Actions\SendFurniture;
use App\Services\RconService;
use App\Models\User;
use App\Models\WebsiteShopArticles;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ShopController extends Controller
{
    public function __invoke()
    {
        return view('shop.shop', [
            'articles' => WebsiteShopArticles::get()
        ]);
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

    public function purchase(WebsiteShopArticles $package, SendCurrency $sendCurrency): Response {
        $user = Auth::user();

        if ($user->rank >= $package->give_rank) {
            return to_route('shop.index')->withErrors(
                ['message' => __('You are already this or a higher rank')],
            );
        }

        if ($user->website_balance < $package->costs) {
            return to_route('shop.index')->withErrors(
                ['message' => __('You need to top-up your account with another $:amount to purchase this package', ['amount' => ($package->costs - $user->website_balance)])],
            );
        }

        DB::transaction(function () use ($user, $package, $sendCurrency) {
            $user->decrement('website_balance', $package->costs);

            if ($package->give_rank) {
                $rcon = app(RconService::class);

                if ($rcon->isConnected) {
                    $rcon->setRank($user, $package->give_rank);
                    $rcon->disconnectUser($user);
                } else {
                    $user->update([
                        'rank' => $package->give_rank,
                    ]);
                }
            }

            $sendCurrency->execute($user, 'credits', $package->credits);
            $sendCurrency->execute($user, 'duckets', $package->duckets);
            $sendCurrency->execute($user, 'diamonds', $package->diamonds);

            if ($package->furniture) {
                $this->handleFurniture(json_decode($package->furniture, true));
            }
        });

        return to_route('shop.index')->with('success', __('Successful!'));
    }

    public function handleFurniture(array $furnitureData)
    {
        $sendFurniture = app(SendFurniture::class);

        $sendFurniture->execute(Auth::user(), $furnitureData);
    }

    private function giveRank () {
        $rcon = app(RconService::class);

        $rcon->setRank();
    }
}
