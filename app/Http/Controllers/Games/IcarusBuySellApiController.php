<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game\Character\TableCharacter;
use App\Models\Game\User\TableUser;
use App\Models\Game\Log\TableCharacterItemQueue;

class IcarusBuySellApiController extends Controller
{
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

        if($proccess == -10)
            return response()->json(['resultCode' => -1003, 'resultMsg' => 'Para realizar a operação o personagem deve estar offline!', 'returnUrl' => '' ], 400);

        if($proccess == -15)
            return response()->json(['resultCode' => -1004, 'resultMsg' => 'Falha ao completar a transação, tente mais tarde!', 'returnUrl' => '' ], 400);

        if($proccess ==  0)
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Atualizado com sucesso!', 'returnUrl' => '' ], 200);

    }

    public function RemoveItemToQueue($sellId)
    {
        $proccess = TableCharacterItemQueue::CancelSellAndRemoveFromQueue($sellId);

        if($proccess == -1)
            return response()->json(['resultCode' => -1000, 'resultMsg' => 'A venda em questão foi concluida!', 'returnUrl' => '' ], 400);

        if($proccess == -2)
            return response()->json(['resultCode' => -1001, 'resultMsg' => 'A venda em questão foi cancelada!', 'returnUrl' => '' ], 400);

        if($proccess == -10)
            return response()->json(['resultCode' => -1003, 'resultMsg' => 'Para realizar a operação o personagem deve estar offline!', 'returnUrl' => '' ], 400);

        if($proccess == -15)
            return response()->json(['resultCode' => -1004, 'resultMsg' => 'Falha ao completar a transação, tente mais tarde!', 'returnUrl' => '' ], 400);

        if($proccess ==  0)
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Atualizado com sucesso!', 'returnUrl' => '' ], 200);
    }

    public function MoveItemToBuyer($sellId, $characterBuyerId)
    {
        $proccess = TableCharacterItemQueue::MoveItemToBuyer($sellId, $characterBuyerId);

        if($proccess == -1)
            return response()->json(['resultCode' => -1000, 'resultMsg' => 'A venda em questão foi concluida!', 'returnUrl' => '' ], 400);

        if($proccess == -2)
            return response()->json(['resultCode' => -1001, 'resultMsg' => 'A venda em questão foi cancelada!', 'returnUrl' => '' ], 400);

        if($proccess == -10)
            return response()->json(['resultCode' => -1003, 'resultMsg' => 'Para realizar a operação o personagem deve estar offline!', 'returnUrl' => '' ], 400);

        if($proccess == -15)
            return response()->json(['resultCode' => -1004, 'resultMsg' => 'Falha ao completar a transação, tente mais tarde!', 'returnUrl' => '' ], 400);

        if($proccess == -25)
            return response()->json(['resultCode' => -1005, 'resultMsg' => 'Você não tem saldo para realizar a compra!', 'returnUrl' => '' ], 400);

        if($proccess == -26)
            return response()->json(['resultCode' => -1005, 'resultMsg' => 'Conta não encontrada na base de dados!', 'returnUrl' => '' ], 400);

        if($proccess == -27)
            return response()->json(['resultCode' => -1006, 'resultMsg' => 'Você não pode vender para si mesmo!', 'returnUrl' => '' ], 400);

        if($proccess ==  0)
            return response()->json(['resultCode' => 1000, 'resultMsg' => 'Atualizado com sucesso!', 'returnUrl' => '' ], 200);
    }
}
