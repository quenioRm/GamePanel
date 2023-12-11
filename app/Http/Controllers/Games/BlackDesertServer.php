<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Game\BlackDesert\Game\TblShoLog;

class BlackDesertServer extends Controller
{
    public function LoadCash(Request $request)
    {
        $user = User::where('uuid', 'like', '%' . $request->accountNo . '%')->first();

        if($user != null)
            return response()->json('0|0|' . $user->cash .  '|0', 200);

        return response()->json('0|0|0|0', 200);
    }

    public function PayCash(Request $request)
    {
        // return response()->json('0|0|0|0|0|0|0', 200);

        $user = User::where('uuid', 'like', '%' . $request->accountNo . '%')->first();
        if($user != null){
            $totalprice = intval($request->onePrice) * intval($request->count);

            if($user->cash >  $totalprice){
                $user->cash -= $totalprice;
                $user->save();

                $log = new TblShoLog();
                $log->accountNo = $request->accountNo;
                $log->userIp = $request->userIp;
                $log->characterName = $request->characterName;
                $log->worldNo = $request->worldNo;
                $log->cashProductNo = $request->cashProductNo;
                $log->cashProductName = $request->cashProductName;
                $log->onePrice = $request->onePrice;
                $log->count = $request->count;
                $log->isGift = $request->isGift;
                $log->toCharacterName = $request->toCharacterName;
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
