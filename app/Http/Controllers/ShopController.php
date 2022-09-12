<?php

namespace App\Http\Controllers;

use App\Http\Requests\RedeemVoucherRequest;
use App\Models\WebsiteShopUsedVoucher;
use App\Models\WebsiteShopVoucher;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function __invoke()
    {
        return view('shop.shop');
    }

    public function redeemVoucher(RedeemVoucherRequest $request)
    {
        $voucher = WebsiteShopVoucher::query()->where('code', '=', $request->input('code'))->withCount('usedVouchers')->first();

        if (!is_null($voucher->expire_at) && (now()->greaterThan($voucher->expire_at)) || $voucher->used_vouchers_count >= $voucher->max_uses) {
            return redirect()->back()->withErrors([
                'message' => __('It seems like the voucher is no longer valid'),
            ]);
        }

        if ($request->user()->vouchersRedeemed()->where('code_id', '=', $voucher->id)->exists() || $voucher->usedVouchers()->where('ip_address', '=', $request->ip())->exists()){
            return redirect()->back()->withErrors([
                'message' => __('It seems like you have already redeemed this voucher once'),
            ]);
        }

        $request->user()->vouchersRedeemed()->create([
            'code_id' => $voucher->id,
            'ip_address' => $request->ip(),
        ]);

        $request->user()->increment('website_store_balance', $voucher->amount);

        return redirect()->back()->with('success', __(':amount$ has been added to your store balance!', ['amount' => $voucher->amount]));
    }
}