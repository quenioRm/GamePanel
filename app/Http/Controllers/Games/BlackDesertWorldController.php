<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game\BlackDesert\World\TblUserInformation;
use App\Models\Game\BlackDesert\World\TblRoleGroupMember;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use DB;
use Session;

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

    public function ResetSubPassword()
    {
        $uuid = substr(Auth::user()->uuid, 0, 30);
        $tblUser = TblUserInformation::where('_userid', $uuid)->first();
        if($tblUser){

            DB::update("EXEC SA_BETA_WORLDDB_0002.PaOperationPublic.uspPasswordReset '".$uuid."', 0");

            Session::flash('message', ['type' => 'success', 'text' => Lang::get('messages.resetSubPwdMsgSuccess')]);

            return redirect(route('gamepanel.controlpanel.panelaccountinfo'));
        }

        Session::flash('message', ['type' => 'error', 'text' => Lang::get('messages.resetSubPwdMsgFailed')]);

        return redirect(route('gamepanel.controlpanel.panelaccountinfo'));
    }
}
