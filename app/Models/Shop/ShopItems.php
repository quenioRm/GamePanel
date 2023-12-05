<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Game\BlackDesert\Game\TblMail;
use App\Models\Game\BlackDesert\World\TblUserInformation;
use App\Models\User;

class ShopItems extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "shopitems";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'subcategoryId', 'itemId', 'name', 'description', 'price', 'available', 'percentOff', 'cashAmount', 'cashBonus'
    ];

    // public function shopSubCategory(){
    //     return $this->belongsTo('App\Models\Shop\ShopCategory', 'subcategoryId');
    // }

    public static function BuyItem($itemId, $itemAmount)
    {

        if(!Auth::user())
            return -1;

        $uuid = substr(Auth::user()->uuid, 0, 30);

        $account = TblUserInformation::where('_userId', $uuid)->first();
        // Family dont exists
        if($account == null)
            return -2;

        $item = self::find($itemId);

        if($item == null)
            return -3;

        $mail = new TblMail();
        $mail->_registerDate = now();
        $mail->_senderName = 'BDLegion';
        $mail->_senderUserNo = 1;
        $mail->_receiverName = $account->_userNickname;
        $mail->_receiverUserNo = $account->_userNo;
        $mail->_title = $item->name;
        $mail->_contents = $item->description;
        $mail->_mailType = 0;
        $mail->_variousNo = $item->itemId;
        $mail->_enchantLevel = 0;
        $mail->_itemCount = $itemAmount;
        $mail->_expirationDate = null;
        $mail->_deletedDate = null;
        $mail->_webItemType = 0;
        $mail->_chargeNo = "";
        $mail->save();

        $cashUpdate = User::find(Auth::user()->id);
        $cashUpdate->cash -= $item->price * $itemAmount;
        $cashUpdate->save();

        return 0;
    }
}
