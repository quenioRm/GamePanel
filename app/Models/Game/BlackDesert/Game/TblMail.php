<?php

namespace App\Models\Game\BlackDesert\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game\BlackDesert\World\TblUserInformation;

class TblMail extends Model
{
    use HasFactory;

    protected $connection = 'game';
    protected $table = "PaGamePrivate.TblMail";
    protected $primaryKey = '_mailNo';
    protected $dates = ['_registerDate', '_expirationDate', '_deletedDate'];
    protected $fillable = [
        '_registerDate',
        '_senderName',
        '_senderUserNo',
        '_receiverName',
        '_receiverUserNo',
        '_title',
        '_contents',
        '_mailType',
        '_variousNo',
        '_enchantLevel',
        '_itemCount',
        '_expirationDate',
        '_deletedDate',
        '_webItemType',
        '_chargeNo'
    ];

    public $timestamps = false;

    public static function SentItem($userno, $itemId, $itemTittle, $itemDescription, $amount, $enchantLevel)
    {

        $account = TblUserInformation::where('_userNo', $userno)->first();

        // Family dont exists
        if($account == null)
            return -1;

        $mail = new TblMail();
        $mail->_registerDate = now();
        $mail->_senderName = 'BDLegion';
        $mail->_senderUserNo = 1;
        $mail->_receiverName = $account->_userNickname;
        $mail->_receiverUserNo = $account->_userNo;
        $mail->_title = $itemTittle;
        $mail->_contents = $itemDescription;
        $mail->_mailType = 0;
        $mail->_variousNo = $itemId;
        $mail->_enchantLevel = $enchantLevel;
        $mail->_itemCount = $amount;
        $mail->_expirationDate = null;
        $mail->_deletedDate = null;
        $mail->_webItemType = 0;
        $mail->_chargeNo = "";
        $mail->save();

        return 'A familia ' . $account->_userNickname . ' acabou de receber:';
    }
}
