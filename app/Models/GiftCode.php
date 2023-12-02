<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\GiftCodeItem;
use App\Models\GiftCodeHistory;
use App\Models\Game\BlackDesert\Game\TblMail;
use App\Models\Game\BlackDesert\World\TblUserInformation;

class GiftCode extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "giftCode";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at', 'expires_at'];
    protected $fillable = [
        'giftCodeId',
        'description',
        'expires_at'
    ];

    public static function RecoverGiftCode($giftCodeId)
    {

        $giftCode = self::where('giftCodeId', $giftCodeId)->first();
        //Dont Exists
        if($giftCode == null)
            return -1;

        //Gift Code Expired
        if($giftCode->expires_at < now())
            return -2;

        $user = Auth::user();

        // Login
        if($user == null)
            return -1000;

        $uuid = substr($user->uuid, 0, 30);

        $account = TblUserInformation::where('_userId', $uuid)->first();
        // Family dont exists
        if($account == null)
            return -3;

        $history = GiftCodeHistory::where('giftCodeId', $giftCodeId)->where('userNo', $account->_userNo)->first();
        // Gitft Recovered
        if($history){
            return -4;
        }

        $items = GiftCodeItem::where('giftCodeId', $giftCodeId)->get();

        foreach ($items as $item) {
            $mail = new TblMail();
            $mail->_registerDate = now();
            $mail->_senderName = 'BDLegion';
            $mail->_senderUserNo = 1;
            $mail->_receiverName = $account->_userNickname;
            $mail->_receiverUserNo = $account->_userNo;
            $mail->_title = $giftCode->giftCodeId;
            $mail->_contents = $giftCode->description;
            $mail->_mailType = 0;
            $mail->_variousNo = $item->itemId;
            $mail->_enchantLevel = $item->enchantLevel;
            $mail->_itemCount = $item->itemCount;
            $mail->_expirationDate = $giftCode->expires_at;
            $mail->_deletedDate = null;
            $mail->_webItemType = 0;
            $mail->_chargeNo = "";
            $mail->save();
        }

        $history = new GiftCodeHistory();
        $history->giftCodeId = $giftCode->giftCodeId;
        $history->userNo = $account->_userNo;
        $history->save();

        return 0;
    }

}
