<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game\Character\TableCharacter;
use App\Models\Game\Character\TableGuildBase;
use App\Models\Game\User\TableUser;
use App\Models\Game\Log\TableCharacterItemQueue;
use App\Models\Game\Log\GuildMarkHistory;
use App\Models\Game\Log\TableAccountLog;

use App\Helpers\Functions;

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

    public function CreateRegisterGuildMarkHistory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'accountId' => 'required',
            'characterId' => '',
            'guildId' => 'required',
            'guildMarkId' => 'required'
        ], [], [
            'accountId' =>  'accountId',
            'characterId' => 'characterId',
            'guildId' =>  'guildId',
            'guildMarkId' =>  'guildMarkId'
        ]);

        if(!$validator->passes()){
            return response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()],'resultData' => null, 'returnUrl' => '' ], 400);
        }

        return response()->json(['resultCode' => 1000, 'resultMsg' => ['message' => GuildMarkHistory::CreteGuildMarkLog($request->all()), 'errors' => null], 'returnUrl' => '' ], 200);
    }

    public function GetGuildMarkList()
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => ['message' => GuildMarkHistory::get(), 'errors' => null], 'returnUrl' => '' ], 200);
    }

    public function UpdateGuildMark($characterId, $guildMarkId)
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => TableGuildBase::UpdateGuildMark($characterId, $guildMarkId), 'returnUrl' => '' ], 200);
    }

    public function GetResumeCharacter(Request $request)
    {
        $accountLang = $request->header('Accept-Language');

        $account = $request->account;
        $characterId = $request->characterId;
        $online = $request->online;

        return response()->json(['resultCode' => 1000, 'resultMsg' => TableCharacter::GetResumeCharacter($account, $characterId, $online, $accountLang), 'returnUrl' => '' ], 200);
    }

    public function GetUserByUserName($username)
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => TableUser::where('Account', $username)->first(), 'returnUrl' => '' ], 200);
    }

    public function GetOnlineAccounts()
    {
        return response()->json(['resultCode' => 1000, 'resultMsg' => TableAccountLog::GetOnlineAccounts(), 'returnUrl' => '' ], 200);
    }
}
