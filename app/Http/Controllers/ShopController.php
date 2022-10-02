<?php

namespace App\Http\Controllers;

use App\Http\Requests\RedeemVoucherRequest;
use App\Models\WebsiteShopUsedVoucher;
use App\Models\WebsiteShopVoucher;
use App\Models\WebsiteShopProduct;
use App\Services\RconService;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function __invoke()
    {
        $vipPackages = WebsiteShopProduct::query()
            ->where('type', '=', 'vip')
            ->get();

//        dd(json_decode($vipPackages[0]->data));

        return view('shop.shop', [
            'vipPackages' => $vipPackages,
        ]);
    }

    public function redeemVoucher(RedeemVoucherRequest $request)
    {
        $voucher = WebsiteShopVoucher::query()->where('code', '=', $request->input('code'))->withCount(
            'usedVouchers'
        )->first();

        if (!is_null($voucher->expire_at) && (now()->greaterThan(
                $voucher->expire_at
            )) || $voucher->used_vouchers_count >= $voucher->max_uses) {
            return redirect()->back()->withErrors([
                'message' => __('It seems like the voucher is no longer valid'),
            ]);
        }

        if ($request->user()->vouchersRedeemed()->where('code_id', '=', $voucher->id)->exists(
            ) || $voucher->usedVouchers()->where('ip_address', '=', $request->ip())->exists()) {
            return redirect()->back()->withErrors([
                'message' => __('It seems like you have already redeemed this voucher once'),
            ]);
        }

        $request->user()->vouchersRedeemed()->create([
            'code_id' => $voucher->id,
            'ip_address' => $request->ip(),
        ]);

        $request->user()->increment('website_store_balance', $voucher->amount);

        return redirect()->back()->with(
            'success',
            __(':amount$ has been added to your store balance!', ['amount' => $voucher->amount])
        );
    }

    public function purchase(WebsiteShopProduct $product, RconService $rcon)
    {
        $productData = json_decode($product->data);
        $package = $productData->content;
        $user = Auth::user();

        if ($user->rank >= $package->rank) {
            return redirect()->back()->withErrors([
                'message' => __('It seems like you already have this or a higher rank, please select another package if possible.')
            ]);
        }

        if ($user->website_store_balance < $productData->price) {
            return redirect()->back()->withErrors([
                'message' => __('You do not have enough balance, to purchase this package. Please add another $:amount before having enough', ['amount' => $productData->price - $user->website_store_balance])
            ]);
        }

        $user->decrement('website_store_balance', $productData->price);

        $rcon->setRank($user, $package->rank);

        return redirect()->back()->with('success', __('Thank you for purchasing :package', ['package' => $productData->name]));
    }
}