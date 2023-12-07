<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game\BlackDesert\World\TblRoleGroupMember;
use Illuminate\Support\Facades\Validator;

class BlackDesertGMController extends Controller
{
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
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Atualizado com sucesso!', 'returnUrl' => '' ], 200);
    }
}
