<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ShopController extends Controller
{
    // TODO: Refactor to fully automatic shop
    public function __invoke(): View
    {
        return view('shop.shop');
    }
}
