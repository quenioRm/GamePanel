<?php

namespace App\Models\Game\Character;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableCharacter extends Model
{
    use HasFactory;

    protected $connection = 'character';
    protected $table = "Table_CharBase";
    protected $primaryKey = 'DBKey';
    // protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'Account', 'Name', 'Deleted', 'Class', 'Level', 'Exp', 'Female', 'Race', 'Angle', 'Money', 'MapId', 'SpaceType', 'PosX',
        'PosY', 'PosZ', 'Hp', 'Mp', 'Sp', 'Ep', 'Fp', 'Tp', 'Rp', 'Fire', 'Ice', 'Light', 'Dark', 'InvenSlot', 'KeepingSlot', 'LastAccessDate',
        'ItemSerialOrder', 'CollectingExp', 'CollectingGrade', 'PartyID', 'byIllegal', 'Comment', 'GuildDBKey', 'GuildMemberType', 'EventInGateArea',
        'StaticWarpArea', 'DynamicWarpMap', 'DynamicWarpPosX', 'DynamicWarpPosY', 'DynamicWarpPosZ', 'DynamicWarpAngle', 'InvenPrioritize',
        'InvenBag1Prioritize', 'InvenBag2Prioritize', 'InvenBag3Prioritize', 'InvenBag4Prioritize', 'OnBoardSkillUnsealed', 'SummonFellow',
        'bMount', 'LastSummonFellow', 'CreateTime', 'byUnderware', 'TotalPlayTime', 'FellowSlot', 'FellowSlotExp', 'FarmDBKey','GuildMemberRankName',
        'GuildMemberPermissions','SoulPoint', 'MatchingRemMSec', 'AccountName', 'Online', 'Ap', 'bCanUseSoulTalents', 'AchievementPoint', 'TitleRecID',
        'MakeCodeNo', 'bMilitiaType', 'BoostSlot', 'Cp', 'StartIdx', 'Integration', 'CanUseSoulTalentsAwaken', 'ExpirationPeriodInvenSlot',
        'FellowBagSlot', 'PreMapId', 'PrePosX', 'PrePosY','PrePosZ', 'MentoringPenaltyTime', 'MentoringGraduationCount', 'Cg', 'ChangeWorld'
    ];


    public function characterItems(){
        return $this->hasMany('App\Models\Game\Character\TableCharacterItem', 'Owner');
    }

    public function characterGuild(){
        return $this->hasMany('App\Models\Game\Character\TableGuildBase', 'GuildMasterDBKey');
    }

    public static function FindCharacterByAccount($accountId)
    {
        return self::where('Account', $accountId)->first();
    }

    public static function FindAccountByCharacter($characterId)
    {
        return self::where('DBKey', $characterId)->first();
    }

    public static function FindCharacterWithGuild($characterId)
    {
        return self::where('DBKey', $characterId)->with(['characterGuild', function($q){
            $q->selectRaw('CAST(binnotice as VARBINARY(max)) as binnotice');
        }])->get();
    }
}
