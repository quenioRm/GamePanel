<?php

namespace App\Models\Game\Character;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableGuildBase extends Model
{
    use HasFactory;

    protected $connection = 'character';
    protected $table = "Table_GuildBase";
    protected $primaryKey = 'DBKey';

    protected $hidden = [
        'binnotice',
    ];

    public $timestamps = false;

    protected $fillable = [
        'DBKey','Deleted','Name','GuildMasterDBKey','GuildGrade','ExploitsPoint','CreateTime','DeleteTime','AllianceDBKey',
        'GuildMemberRankName1','GuildMemberPermissions1','GuildMemberRankName2','GuildMemberPermissions2','GuildMemberRankName3',
        'GuildMemberPermissions3','GuildMemberRankName4','GuildMemberPermissions4','GuildMemberRankName5','GuildMemberPermissions5',
        'GuildMemberRankName6','GuildMemberPermissions6','GuildMemberRankName7','GuildMemberPermissions7','GuildMemberRankName8',
        'GuildMemberPermissions8','binnotice','GuildMarkID','bDismiss','DismissDate','WithdrawalGuildUnion','Chamber1st',
        'Chamber1stCloseDate','Chamber2nd','Chamber2ndCloseDate','Chamber3rd','Chamber3rdCloseDate','HonorPoint','AutoJoin'
    ];

    public function character(){
        return $this->belongsTo('App\Models\Game\Character\TableCharacter', 'GuildMasterDBKey');
    }

    public static function UpdateGuildMark($characterId, $guildMarkId)
    {
        $data = self::where('GuildMasterDBKey', $characterId)->first();
        if($data){
            $data->GuildMarkID = $guildMarkId;
            $data->save();

            return true;
        }

        return false;
    }
}
