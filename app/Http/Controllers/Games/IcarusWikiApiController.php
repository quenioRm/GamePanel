<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Functions;

class IcarusWikiApiController extends Controller
{
    public function GetItemDescription($itemId)
    {
        $item = [
            'name' => Functions::GetNameTranslateFromXml($itemId, "pt-BR"),
            'description' => Functions::GetNameTranslateFromXml($itemId, "pt-BR", "Description"),
            'icon' => Functions::FindElementInGameBin($itemId, "icon")
        ];

        return response()->json(['resultCode' => 1000, 'resultMsg' => ['message' => $item, 'errors' => null], 'resultData' => null, 'returnUrl' => '' ], 200);
    }
}
