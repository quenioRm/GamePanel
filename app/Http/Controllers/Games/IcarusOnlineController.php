<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IcarusOnlineController extends Controller
{
    public function IcarusAuthCheck(Request $request)
    {

        // return phpinfo();

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

    public function Test()
    {
        $xml = 'null';

        $xml = '<root>' .
        '<getParamInfo>' .
        '<keyVal1 value="186d04fe-9943-4000-8597-d2856ae54ba0"/>' .
        '<keyVal2 value="123456"/>' .
        '<m value="P"/>' .
        '</getParamInfo>' .
        '<getResultInfo>' .
        '<result value="101"/>' .
        '<resultMsg value="e"/>' .
        '<LoginID value="quenio"/>' .
        '<Permission value="100"/>' .
        '<UserAge value="20"/>' .
        '<MakeCodeNo value="3913056"/>' .
        '<UserType value="0"/>' .
        '<StateDetail value="0"/>' .
        '<PCRoomType value="1"/>' .
        '<PCRoomID value="1"/>' .
        '<UIDSEQ value="1"/>' .
        '</getResultInfo>' .
        '</root>';

        return response()->xml($xml, $status = 200, $headers = [], $xmlRoot = '', $encoding = null);
    }
}
