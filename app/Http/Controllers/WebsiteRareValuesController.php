<?php

namespace App\Http\Controllers;

use App\Http\Requests\RareSearchFormRequest;
use App\Models\Item;
use App\Models\WebsiteRareValue;
use App\Models\WebsiteRareValueCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WebsiteRareValuesController extends Controller
{
    public function index()
    {
        return view('rare-values', [
            'categories' => WebsiteRareValueCategory::with('furniture')->get(),
            'categoriesNav' => WebsiteRareValueCategory::all(),
        ]);
    }

    public function category(int $id)
    {
        if (WebsiteRareValueCategory::where('id', '=', $id)->doesntExist()) {
            return redirect()->back()->withErrors([
                'message' => __('The entered category does not exist'),
            ]);
        }

        return view('rare-values', [
            'categories' => WebsiteRareValueCategory::whereId($id)->with('furniture')->get(),
            'categoriesNav' => WebsiteRareValueCategory::all(),
        ]);
    }

    public function search(RareSearchFormRequest $request)
    {
        if (WebsiteRareValue::where('name', 'like', '%' . $request->input('search') . '%')->doesntExist()) {
            return redirect()->back()->withErrors([
                'message' => __('It seems like there were no rares matching your search input'),
            ]);
        }

        return view('rare-values', [
            'categories' => WebsiteRareValueCategory::query()
                ->whereHas('furniture')
                ->with(['furniture' => function($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->input('search') . '%');
                }])
                ->get(),
            'categoriesNav' => WebsiteRareValueCategory::all(),
        ]);
    }

    public function value(WebsiteRareValue $value)
    {
        if ((bool)setting('enable_caching')) {
            Cache::add('allItems', Item::all(), now()->addMinutes(setting('cache_timer')));

            $items = Cache::get('allItems')->filter(function($item) use ($value) {
                return $item->item_id === $value->item_id;
            });
        } else {
            $items = Item::all()->filter(function($item) use ($value) {
                return $item->item_id === $value->item_id;
            });
        }


        return view('value', [
            'value' => $value,
            'items' => $items,
        ]);
    }
}