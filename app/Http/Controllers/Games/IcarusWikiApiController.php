<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Functions;

class IcarusWikiApiController extends Controller
{
    public function GetIconFromItem($itemId)
    {
        return Functions::GetNameTranslateFromXml($itemId, "pt-BR");
        return Functions::FindElementInGameBin($itemId, "icon");
    }
}
