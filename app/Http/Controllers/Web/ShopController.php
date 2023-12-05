<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop\ShopCategory;
use App\Models\Shop\ShopItems;
use App\Models\Shop\ShopItemsInfos;
use Session;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('RouteCheck');
    }

    public function Index()
    {
        session()->put('selectedCategory', ShopCategory::first());

        return view('web.shop.pages.indexItems', [
            'categories' => ShopCategory::get(),
            'items' => ShopItems::paginate(10)->toArray()
        ]);
    }

    public function ShopCategory($id)
    {
        $category = ShopCategory::where('id', $id)->first();
        session()->put('selectedCategory', $category);

        if ($category){
            if ($category->name == 'Todos'){
                return view('web.shop.pages.indexItems', [
                    'categories' => ShopCategory::get(),
                    'items' => ShopItems::paginate(10)->toArray()
                ]);
            }else{
                return view('web.shop.pages.indexItems', [
                    'categories' => ShopCategory::get(),
                    'items' => ShopItems::where('categoryId', $id)->paginate(10)->toArray()
                ]);
            }
        }
    }

    public function ShopItemDetails($id)
    {
        return view('web.shop.pages.itemdetails',[
            'categories' => ShopCategory::get(),
            'item' => ShopItems::where('id', $id)->first(),
            'details' => ShopItemsInfos::where('shopItemId', $id)->get()
        ]);
    }
}
