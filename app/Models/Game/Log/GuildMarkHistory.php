<?php

namespace App\Models\Game\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GuildMarkHistory extends Model
{
    use HasFactory;

    protected $connection = 'log';
    protected $table = "Table_GuildMark_History";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'id',
        'accountId',
        'characterId',
        'guildId'
    ];

    public static function FindAndCreate($accountId, $characterId, $guildId)
    {
        $data = self::where('accountId', $accountId)->where('characterId', $characterId)->where('guildId', $guildId)
        ->orderBy('updated_at', 'desc')->first();

        if($data){

            $datework = new Carbon($data->updated_at);
            $diff = $datework->diffInDays($datework);

            if($diff < 10){
                return "Ainda faltam " . $diff . " dias para poder atualizar a logo da sua guild";
            }

            $data->updated_at = now();
            $data->save();

            return "";
        }

        $newReg = new GuildMarkHistory();
        $newReg->accountId = $accountId;
        $newReg->characterId = $characterId;
        $newReg->guildId = $guildId;
        $newReg->save();

        return "";
    }
}
