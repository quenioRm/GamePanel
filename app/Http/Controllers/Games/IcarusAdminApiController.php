<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game\Character\TableCharacter;
use App\Models\Game\User\TableUser;

class IcarusAdminApiController extends Controller
{
    public function FindCharacterByAccount($accountId)
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => TableCharacter::FindCharacterByAccount($accountId), 'returnUrl' => '' ], 200);
    }

    public function GetUserWithCharacters($dBKey)
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => TableUser::GetUserWithCharacters($dBKey), 'returnUrl' => '' ], 200);
    }
}
