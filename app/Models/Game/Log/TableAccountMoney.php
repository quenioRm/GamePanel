<?php

namespace App\Models\Game\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableAccountMoney extends Model
{
    use HasFactory;

    protected $connection = 'log';
    protected $table = "Table_AccountMoney";
    protected $primaryKey = 'accountId';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'accountId',
        'money'
    ];

    public static function GetCurrentMoney($accountId)
    {
        $money = self::where('accountId', $accountId)->first();
        if($money == null)
            return 0;

        return $money->money;
    }

    public static function UpdateMoney($accountId, $money)
    {
        $account = self::where('accountId', $accountId)->first();
        if($account != null){
            $account->money = $money;
            $account->save();
        }
    }
}
