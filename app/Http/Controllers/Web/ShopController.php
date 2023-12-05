<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop\ShopCategory;
use App\Models\Shop\ShopItems;
use App\Models\Shop\ShopItemsInfos;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

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

    public function buyCashShopItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'amount' => 'required'
        ], [], [
            'id' =>  'id',
            'amount' =>  'amount',
        ]);

        if(!$validator->passes())
            return redirect(route('controlpanel.pages.giftcode'))->withInput()->withErrors($validator->errors());

        $shopItem = ShopItems::BuyItem($request->id, $request->amount);

        switch ($gift) {
            case -1:
                return response()->json(['resultCode' => -1001, 'resultMsg' => ['message' => '', 'errors' =>
                Lang::get('messages.userNotFound')], 'resultData' => null,'returnUrl' => '' ], 400);
                break;
            case -2:
                return response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' =>
                Lang::get('messages.familydontExists')], 'resultData' => null,'returnUrl' => '' ], 400);
                break;
            case -3:
                return response()->json(['resultCode' => -1003, 'resultMsg' => ['message' => '', 'errors' =>
                Lang::get('messages.itemNotExists')], 'resultData' => null,'returnUrl' => '' ], 400);
                break;
        }

        return response()->json(['resultCode' => 0, 'resultMsg' => Lang::get('messages.buysuccess'), 'resultData' => null, 'returnUrl' => '' ], 200);
    }
}
