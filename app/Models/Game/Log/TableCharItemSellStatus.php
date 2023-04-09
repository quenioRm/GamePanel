<?php

namespace App\Models\Game\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableCharItemSellStatus extends Model
{
    use HasFactory;

    // Status
    // 0 = in queue
    // 1 = item sell
    // 2 = cancelled

    protected $connection = 'log';
    protected $table = "Table_CharItemSellStatus";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'id',
        'accountId',
        'charItemSelliD',
        'sellStatus',
    ];

    public $timestamps = false;

    public static function MakeNewRegister($accountId, $charItemSelliD)
    {
        $reg = new TableCharItemSellStatus();
        $reg->accountId = $accountId;
        $reg->charItemSelliD = $charItemSelliD;
        $reg->sellStatus = 0;
        $reg->created_at = now();
        $reg->updated_at = now();
        $reg->save();
    }

    public static function FindSell($id)
    {
        return self::find($id);
    }
}
