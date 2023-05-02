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
        'guildId',
        'guildMarkId'
    ];

    public static function CreteGuildMarkLog($input)
    {
        $newReg = new GuildMarkHistory();
        $newReg->accountId = $input['accountId'];
        $newReg->characterId = $input['characterId'];
        $newReg->guildId = $input['guildId'];
        $newReg->guildId = $input['guildMarkId'];
        $newReg->save();

        return "";
    }
}
