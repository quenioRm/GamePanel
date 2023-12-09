<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game\BlackDesert\Game\TblBriefUserInformation;

class BlackDesertGameController extends Controller
{
    //

    public function GetBriefAccounts()
    {
        $accounts = TblBriefUserInformation::get();

        if($accounts)
            return response()->json(['resultCode' => 1000, 'resultMsg'
                => 'Atualizado com sucesso!', 'returnUrl' => '', 'resultData' => $accounts ], 200);

        return response()->json(['resultCode' => -1000, 'resultMsg'
                => 'Atualizado com sucesso!', 'returnUrl' => '', 'resultData' => [] ], 400);
    }
}
