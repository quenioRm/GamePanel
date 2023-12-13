<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Game\BlackDesert\Game\TblShoLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlackDesertServer extends Controller
{
    public function __construct()
    {
        $this->middleware('logger');
    }

    public function LoadCash(Request $request)
    {
        $json = $request->getContent();
        $json = preg_replace('/"accountNo":\s*([^\s,}]+)/', '"accountNo": "$1"', $json);
        $data = json_decode($json, true);

        if($data == null)
            return response()->json('0|0|0|0', 200);

        $user = User::where('uuid', 'like', '%' . $data['accountNo'] . '%')->first();
        if($user != null)
            return response()->json('0|0|' . $user->cash .  '|0', 200);

        return response()->json('0|0|0|0', 200);
    }

    public function PayCash(Request $request)
    {
        $json = $request->getContent();
        $json = preg_replace('/"accountNo":\s*([^\s,}]+)/', '"accountNo": "$1"', $json);
        $data = json_decode($json, true);

        if($data == null)
            return response()->json('0|0|0|0|0|0', 200);

        $user = User::where('uuid', 'like', '%' . $data['accountNo'] . '%')->first();
        if($user != null){
            $totalprice = intval($data['onePrice']) * intval($data['count']);

            if($user->cash >=  $totalprice){
                $user->cash -= $totalprice;
                $user->save();

                $log = new TblShoLog();
                $log->accountNo = $data['accountNo'];
                $log->userIp = $data['userIp'];
                $log->characterName = $data['characterName'];
                $log->worldNo = $data['worldNo'];
                $log->cashProductNo = $data['cashProductNo'];
                $log->cashProductName = $data['cashProductName'];
                $log->onePrice = $data['onePrice'];
                $log->count = $data['count'];
                $log->isGift = $data['isGift'];
                $log->toCharacterName = $data['toCharacterName'];
                $log->save();

            }else{
                return response()->json('0|0|' . $user->cash .  '|0|0|0', 200);
            }

            return response()->json('0|0|' . $user->cash .  '|0|0|0|0', 200);
        }

        return response()->json('0|0|0|0|0|0', 200);
    }

    public function Authenticate(Request $request)
    {
        // $user = User::where('uuid', 'like', '%' . $request->accountNo . '%')->first();

        // if($user)
        //     return response()->json('0|' . $user->uuid .  '|0|0|0', 200);

        return response()->json('0|0|0|0|0', 200);
    }
}
