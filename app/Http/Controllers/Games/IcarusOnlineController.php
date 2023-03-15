<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CashShopBuyHistory;

class IcarusOnlineController extends Controller
{
    public function IcarusAuthCheck(Request $request)
    {
        $account = User::FindAccountByUUID($request['keyVal1']);
        if($account == null)
            return null;

        if($account->isBlockEmailDomain == 1)
            return null;

        $data = array(
            'getParamInfo' => [
                'keyVal1' => [
                    '@attributes' => array(
                        'value' => $account->uuid // UUID
                    )
                ],
                'keyVal2' => [
                    '@attributes' => array(
                        'value' => 123456 // Version
                    )
                ],
                'm' => [
                    '@attributes' => array(
                        'value' => "P" // Unk
                    )
                ]
            ],
            'getResultInfo' => [
                'result' => [
                    '@attributes' => array(
                        'value' => 101
                    )
                ],
                'resultMsg' => [
                    '@attributes' => array(
                        'value' => 'e' // Version
                    )
                ],
                'LoginID' => [
                    '@attributes' => array(
                        'value' => $account->name // Unk
                    )
                ],
                'Permission' => [
                    '@attributes' => array(
                        'value' => $account->permission // Unk
                    )
                ],
                'UserAge' => [
                    '@attributes' => array(
                        'value' => 20 // Unk
                    )
                ],
                'MakeCodeNo' => [
                    '@attributes' => array(
                        'value' => '3913056' // Unk
                    )
                ],
                'UserType' => [
                    '@attributes' => array(
                        'value' => '0' // Unk
                    )
                ],
                'StateDetail' => [
                    '@attributes' => array(
                        'value' => '0' // Unk
                    )
                ],
                'PCRoomType' => [
                    '@attributes' => array(
                        'value' => '1' // Unk
                    )
                ],
                'PCRoomID' => [
                    '@attributes' => array(
                        'value' => '1' // Unk
                    )
                ],
                'UIDSEQ' => [
                    '@attributes' => array(
                        'value' => $account->id // Unk
                    )
                ]
            ]
        );
        return response()->xml($data, $status = 200, $headers = [], $xmlRoot = 'root', $encoding = null);
    }

    public function inquiryBalance(Request $request)
    {
        if(isset($request['userId'])){

            $userID = str_replace('@nx', '', $request['userId']);
            //$userID = $request['userId'];
            $realBalance = 0;
            $bonusBalance = 0;

            $cashAccount = User::where('name', $userID)->first();
            if($cashAccount){
                $realBalance = $cashAccount->cash != null ? $cashAccount->cash : 0;

                return response()->json([
                    'result' => 'success',
                    'realCash' => intval($realBalance),
                    'bonusCash' => intval($bonusBalance)
                ],200);
            }
        }

        return response()->json([
            'result' => 'success',
            'realCash' =>1000,
            'bonusCash' => 1000
        ],200);
    }

    public function purchaseItem(Request $request)
    {
        $makeCodeNo = 0;
        $userNo = 0;
        $userId = '';
        $itemId = '';
        $itemCnt = 0;
        $itemUnitPrice = 0;
        $gameServerNo = 0;
        $statProperty1 = '';
        $statProperty2 = '';
        $statProperty3 = '';
        $location = '';
        $clientIp = '';
        $channelingUserId = '';
        $charId = 0;

        $data = explode('&', $_SERVER['QUERY_STRING']);

        foreach ($data as $param) {
            list($name, $value) = explode('=', $param, 2);

            if ($name == 'makeCodeNo') {
                $makeCodeNo = $value;
            }
            if ($name == 'userNo') {
                $userNo = $value;
            }
            if ($name == 'userId') {
                $userId = $value;
            }
            if ($name == 'itemInfos[0].itemId') {
                $itemId = $value;
            }
            if ($name == 'itemInfos[0].itemCnt') {
                $itemCnt = $value;
            }
            if ($name == 'itemInfos[0].itemUnitPrice') {
                $itemUnitPrice = $value;
            }
            if ($name == 'gameServerNo') {
                $gameServerNo = $value;
            }
            if ($name == 'statProperty1') {
                $statProperty1 = $value;
            }
            if ($name == 'statProperty2') {
                $statProperty2 = $value;
            }
            if ($name == 'statProperty3') {
                $statProperty3 = $value;
            }
            if ($name == 'location') {
                $location = $value;
            }
            if ($name == 'ClientIp') {
                $clientIp = $value;
            }
            if ($name == 'ChannelingUserId') {
                $channelingUserId = $value;
            }
            if ($name == 'charId') {
                $charId = $value;
            }
        }

        $datajson = null;
        $userId = str_replace('@nx', '', $userId);
        $Account = User::where('name', $userId)->first();

        if ($Account != null) {

            $linkItemID = $chekProdInfo[0]->LinkItemID;
            $itemPrase = $chekProdInfo[0]->Price;
            $itemCount = $chekProdInfo[0]->Count;

            if ($itemCnt == $itemCount) {

                $realBalance = $Account->cash != null ? $Account->cash : 0;
                $totalBalance = $realBalance;

                if ($totalBalance >= $itemPrase) {

                    $totalBalance = $totalBalance - $itemPrase;

                    User::UpdateCash($Account->name, $totalBalance);

                    CashShopBuyHistory::makeNew($Account->id,  $linkItemID, $itemCount, $itemPrase);

                    $datajson = '{
                        "statProperty2": null,
                        "statProperty1": "' . $statProperty1 . '",
                        "statProperty3": "success",
                        "realCash": ' . $realBalance . ',
                        "bonusCash": 0,
                        "chargedCashAmt": ' . $itemPrase . ',
                        "itemInfos": [
                            {
                                "itemCnt": ' . $itemCount . ',
                                "itemId": "' . $linkItemID . '",
                                "itemUnitPrice": ' . $itemPrase . '
                            }
                        ]
                    }';

                    die($datajson);

                }else{
                    $datajson = [
                        'statProperty2' => '1009996'
                    ];
                }

            }else{
                $datajson = [
                    'statProperty2' => '1001002'
                ];
            }

        }else{
            $datajson = [
                'statProperty2' => '1001002'
            ];
        }

        return response()->json($datajson, 200);
    }
}
