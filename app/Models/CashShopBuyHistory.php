<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashShopBuyHistory extends Model
{
    use HasFactory;

    protected $connection = "web";
    protected $fillable = [
        'user_id',
        'itemId',
        'itemCnt',
        'itemUnitPrice'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public static function makeNew($userId, $itemId, $itemCnt, $itemUnitPrice)
    {
        $history = new CashShopBuyHistory();
        $history->user_id = $userId;
        $history->itemId = $itemId;
        $history->itemCnt = $itemCnt;
        $history->itemUnitPrice = $itemUnitPrice;
        $history->save();
    }
}
