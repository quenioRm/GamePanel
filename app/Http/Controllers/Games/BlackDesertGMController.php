<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game\BlackDesert\World\TblRoleGroupMember;
use Illuminate\Support\Facades\Validator;
use App\Models\Game\BlackDesert\Game\TblMail;

class BlackDesertGMController extends Controller
{
    public function __construct()
    {
        $this->middleware('GmRequestAuthenticate')->except('UpdateIp');
    }

    public function UpdateIp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userNo' => 'required',
            'IP' => 'required',
        ], [], [
            'userNo' =>  'FamilyName',
            'IP' => 'IP',
        ]);

        if(!$validator->passes()){
            return response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()],'resultData' => null, 'returnUrl' => '' ], 400);
        }

        $update = TblRoleGroupMember::UpdateGmIP($request['userNo'], $request['IP']);

        if($update == -1)
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Familia não encontrada!', 'returnUrl' => '' ], 400);

        if($update == -2)
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Familia não encontrada!', 'returnUrl' => '' ], 400);

        if($update ==  0)
            return response()->json(['resultCode' => 0, 'resultMsg' => 'Atualizado com sucesso!', 'returnUrl' => '' ], 200);
    }

    public function SentItemForAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userNo' => 'required',
            'itemId' => 'required',
            'tittle' => 'required',
            'message' => 'required',
            'amount' => 'required',
            'enchantLevel' => 'required'
        ], [], [
            'userNo' =>  'userNo',
            'itemId' => 'itemId',
            'tittle' => 'tittle',
            'message' => 'message',
            'amount' => 'amount',
            'enchantLevel' => 'enchantLevel'
        ]);

        if(!$validator->passes()){
            return response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()],'resultData' => null, 'returnUrl' => '' ], 400);
        }

        $sentItem = TblMail::SentItem($request->userNo, $request->itemId, $request->tittle,
        $request->message, $request->amount, $request->enchantLevel);

        if($sentItem == -1)
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Familia não encontrada!', 'returnUrl' => '' ], 400);

        return response()->json(['resultCode' => 0, 'resultMsg' => $sentItem, 'returnUrl' => '' ], 200);
    }
}
