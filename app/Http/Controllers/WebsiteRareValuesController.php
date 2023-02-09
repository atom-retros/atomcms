<?php

namespace App\Http\Controllers;

use App\Http\Requests\RareSearchFormRequest;
use App\Models\Item;
use App\Models\WebsiteRareValue;
use App\Models\WebsiteRareValueCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class WebsiteRareValuesController extends Controller
{
    public function index()
    {
        return view('rare-values', [
            'categories' => WebsiteRareValueCategory::with('furniture')->get(),
            'categoriesNav' => WebsiteRareValueCategory::all(),
        ]);
    }

    public function category(int $id): View|RedirectResponse
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

    public function search(RareSearchFormRequest $request): View|RedirectResponse
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

    public function value(WebsiteRareValue $value): View
    {
        $query = Item::query()->select(['id', 'user_id', 'item_id']);
        $query->with(['user' => function($query) {
            $query->select(['id', 'username', 'look']);
        }]);

        if ((bool)setting('enable_caching')) {
            $items = Cache::remember('allItems_' . $value->id, setting('cache_timer'), function() use ($query, $value) {
                return $query->get()->filter(function($item) use ($value) {
                    return $item->item_id === $value->item_id;
                });
            });
        } else {
            $items = $query->get()->filter(function($item) use ($value) {
                return $item->item_id === $value->item_id;
            });
        }

        $itemsPerUser = $items->groupBy('user_id')->map(function($group) {
            return [
                'user' => $group->first()->user,
                'item_count' => $group->count(),
            ];
        });

        return view('value', [
            'value' => $value,
            'items' => $itemsPerUser,
        ]);
    }
}