<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BlackDesertServer extends Controller
{
    public function LoadCash(Request $request)
    {
        $user = User::where('uuid', 'like', '%' . $request->accountNo . '%')->first();

        if($user != null)
            return response()->json('0|0|' . $user->cash .  '|0', 200);

        return response()->json('0|0|1000000|0', 200);
    }

    public function PayCash(Request $request)
    {
        return response()->json('0|0|1000000|0|0|0|0', 200);
    }

    public function Authenticate(Request $request)
    {
        // $user = User::where('uuid', 'like', '%' . $request->accountNo . '%')->first();

        // if($user)
        //     return response()->json('0|' . $user->uuid .  '|0|0|0', 200);

        return response()->json('0|0|0|0|0', 200);
    }
}
