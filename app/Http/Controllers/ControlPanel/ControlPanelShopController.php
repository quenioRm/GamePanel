<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop\ShopSubCategory;
use App\Models\Shop\ShopCategory;
use App\Models\Shop\ShopItems;

class ControlPanelShopController extends Controller
{
    public function ShopItemList()
    {
        // dd(ShopItems::with('shopSubCategory')->orderBy('created_at', 'desc')->paginate(5)->toArray());
        return view('controlpanel.pages.includes.shopitem',
        [
            'categories' => ShopCategory::with('shopSubCategory')->get()->toArray(),
            'items' => ShopItems::with('shopSubCategory')->orderBy('created_at', 'desc')->paginate(4)->toArray()
        ]);
    }
}
