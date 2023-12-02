<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop\ShopCategory;
use App\Models\Shop\ShopItems;
use Session;

class ShopController extends Controller
{
    public function Shop()
    {
        session()->put('selectedCategory', ShopCategory::first());

        return view('web.' . env('SELECTED_WEB') . '.pages.shopPages.shop', [
            'categories' => ShopCategory::get(),
            'items' => ShopItems::paginate(10)
        ]);
    }

    public function ShopCategory($id)
    {
        $category = ShopCategory::where('id', $id)->first();
        session()->put('selectedCategory', $category);

        if ($category){
            if ($category->name == 'Todos'){
                return view('web.' . env('SELECTED_WEB') . '.pages.shopPages.shop', [
                    'categories' => ShopCategory::get(),
                    'items' => ShopItems::paginate(10)
                ]);
            }else{
                return view('web.' . env('SELECTED_WEB') . '.pages.shopPages.shop', [
                    'categories' => ShopCategory::get(),
                    'items' => ShopItems::where('categoryId', $id)->paginate(10)
                ]);
            }
        }
    }
}
