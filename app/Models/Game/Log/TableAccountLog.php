<?php

namespace App\Models\Game\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableAccountLog extends Model
{
    use HasFactory;

    protected $connection = 'log';
    protected $table = "Table_Account_Login_Log";
    protected $primaryKey = 'accountId';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'id',
        'accountId',
        'characterId',
        'onlineStatus',
    ];

    public static function CheckAccountIsOnline($characterId)
    {
        $status = self::where('characterId', $characterId)->first();
        if($status == null)
            return 0;

        return $status->onlineStatus;
    }

    public static function GetOnlineAccounts()
    {
        return self::where('onlineStatus', 0)->get();
    }
}
