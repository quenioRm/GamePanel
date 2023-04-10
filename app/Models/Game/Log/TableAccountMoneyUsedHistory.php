<?php

namespace App\Models\Game\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableAccountMoneyUsedHistory extends Model
{
    use HasFactory;

    protected $connection = 'log';
    protected $table = "Table_AccountMoneyUsedHistory";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'accountId',
        'money',
        'sellId'
    ];

    public static function MakeNew($accountId, $money, $sellId)
    {
        $reg = new TableAccountMoneyUsedHistory();
        $reg->accountId = $accountId;
        $reg->money = $money;
        $reg->sellId = $sellId;
        $reg->created_at = now();
        $reg->updated_at = now();
        $reg->save();
    }

}
