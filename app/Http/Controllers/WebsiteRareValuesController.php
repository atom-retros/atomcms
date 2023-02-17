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
            'categories' => WebsiteRareValueCategory::orderBy('priority')->with('furniture')->get(),
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
            'categories' => WebsiteRareValueCategory::orderBy('priority')->whereId($id)->with('furniture')->get(),
            'categoriesNav' => WebsiteRareValueCategory::all(),
        ]);
    }

    public function search(RareSearchFormRequest $request): View|RedirectResponse
    {
        $searchTerm = $request->input('search');

        $categories = WebsiteRareValueCategory::orderBy('priority')->whereHas('furniture', function($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        })
            ->with(['furniture' => function($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            }])
            ->get();

        if ($categories->isEmpty()) {
            return redirect()->back()->withErrors([
                'message' => __('It seems like there were no rares matching your search input'),
            ]);
        }

        return view('rare-values', [
            'categories' => $categories,
            'categoriesNav' => WebsiteRareValueCategory::has('furniture')->get(),
        ]);
    }

    public function value(WebsiteRareValue $value): View
    {
        $items = Item::with(['user:id,username,look'])
            ->where('item_id', $value->item_id)
            ->get();

        $itemsPerUser = $items->groupBy('user_id')->map(function($group) {
            return [
                'user' => $group->first()->user,
                'item_count' => $group->count(),
            ];
        });

        if ((bool)setting('enable_caching')) {
            Cache::remember('allItems_' . $value->id, setting('cache_timer'), function() use ($items) {
                return $items;
            });
        }

        return view('value', [
            'value' => $value,
            'items' => $itemsPerUser,
        ]);
    }
}