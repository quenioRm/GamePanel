<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game\BlackDesert\World\TblUserInformation;
use App\Models\Game\BlackDesert\World\TblRoleGroupMember;

class BlackDesertWorldController extends Controller
{
    public function FindUser($uuid)
    {
        $user = TblUserInformation::FindUser($uuid);

        if($user)
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Sucesso!', 'resultData' =>
                [
                    'userNo' => $user->_userNo,
                    'userNickname' => $user->_userNickname
                ]
            , 'returnUrl' => '' ], 200);

        return response()->json(['resultCode' => -1, 'resultMsg' => 'Falha!','resultData' => null, 'returnUrl' => '' ], 400);
    }

    public function GetGmAccounts()
    {
        $gmAccounts = TblRoleGroupMember::get();
        if($gmAccounts)
            return response()->json(['resultCode' => -1, 'resultMsg' => 'Falha!','resultData' => $gmAccounts, 'returnUrl' => '' ], 200);

        return response()->json(['resultCode' => -1, 'resultMsg' => 'Falha!','resultData' => null, 'returnUrl' => '' ], 400);
    }
}
