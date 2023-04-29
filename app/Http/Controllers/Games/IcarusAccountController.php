<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game\Character\TableCharacter;
use App\Models\Game\Character\TableGuildBase;
use App\Models\Game\User\TableUser;
use App\Models\Game\Log\TableCharacterItemQueue;
use App\Models\Game\Log\GuildMarkHistory;

class IcarusAccountController extends Controller
{
    public function FindAccountIdByUsername($account)
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => TableUser::where('Account', $account)->first(), 'returnUrl' => '' ], 200);
    }

    public function FindCharacterByAccount($accountId)
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => TableCharacter::FindCharacterByAccount($accountId), 'returnUrl' => '' ], 200);
    }

    public function GetUserWithCharactersByID($dBKey)
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => TableUser::GetUserWithCharacters($dBKey), 'returnUrl' => '' ], 200);
    }

    public function GetGuildByCharacter($dBKey)
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => TableCharacter::FindCharacterWithGuild($dBKey), 'returnUrl' => '' ], 200);
    }

    public function UpdateGuildMark($characterId, $guildMarkId)
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => TableGuildBase::UpdateGuildMark($characterId, $guildMarkId), 'returnUrl' => '' ], 200);
    }

    public function CreateRegisterGuildMarkHistory($accountId, $characterId, $guildId)
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => ['message' => GuildMarkHistory::FindAndCreate($accountId, $characterId, $guildId), 'errors' => null], 'returnUrl' => '' ], 200);
    }
}
