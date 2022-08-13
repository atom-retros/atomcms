<?php

namespace App\Http\Controllers;

class ShopController extends Controller
{
    // TODO: Refactor to fully automatic shop
    public function __invoke()
    {
        return view('shop.shop');
    }
}