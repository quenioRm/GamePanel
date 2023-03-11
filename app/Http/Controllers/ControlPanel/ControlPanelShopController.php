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
        return view('controlpanel.pages.includes.shopitem',
        [
            'categories' => ShopCategory::with('shopSubCategory')->get()->toArray(),
            'items' => ShopItems::with('shopSubCategory')->orderBy('created_at', 'desc')->paginate(4)->toArray()
        ]);
    }

    public function ShopItemListByCategory($subcategoryId)
    {
        return view('controlpanel.pages.includes.shopitem',
        [
            'categories' => ShopCategory::with('shopSubCategory')->get()->toArray(),
            'items' => ShopItems::with('shopSubCategory')
                    ->where('subcategoryId', $subcategoryId)->orderBy('created_at', 'desc')->paginate(4)->toArray()
        ]);
    }
}
