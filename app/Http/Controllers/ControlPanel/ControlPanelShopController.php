<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControlPanelShopController extends Controller
{
    public function ShopItemList()
    {
        return view('controlpanel.pages.shoplist');
    }
}
