<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game\Character\TableCharacter;
use App\Models\Game\User\TableUser;
use App\Models\Game\Log\TableCharacterItemQueue;

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

    public function MoveItemToQueue(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $proccess = TableCharacterItemQueue::MoveItemToQueue($data);

        if($proccess == -1)
            return response()->json(['resultCode' => -1000, 'resultMsg' => 'Quantidade de venda superior ao saldo!', 'returnUrl' => '' ], 400);

        if($proccess == -2)
            return response()->json(['resultCode' => -1001, 'resultMsg' => 'Item não encontrado, verifique!', 'returnUrl' => '' ], 400);

        if($proccess == -3)
            return response()->json(['resultCode' => -1002, 'resultMsg' => 'Item não encontrado, verifique!', 'returnUrl' => '' ], 400);

        if($proccess == -15)
            return response()->json(['resultCode' => -1003, 'resultMsg' => 'Falha ao completar a transação, tente mais tarde!', 'returnUrl' => '' ], 400);

        if($proccess ==  0)
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Atualizado com sucesso!', 'returnUrl' => '' ], 200);

    }

    public function RemoveItemToQueue($sellId)
    {
        $proccess = TableCharacterItemQueue::CancelSellAndRemoveFromQueue($sellId);

        if($proccess == -1)
            return response()->json(['resultCode' => -1000, 'resultMsg' => 'A venda em questão ja foi cancelada!', 'returnUrl' => '' ], 400);

        if($proccess == -15)
            return response()->json(['resultCode' => -1003, 'resultMsg' => 'Falha ao completar a transação, tente mais tarde!', 'returnUrl' => '' ], 400);

        if($proccess ==  0)
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Atualizado com sucesso!', 'returnUrl' => '' ], 200);
    }
}
