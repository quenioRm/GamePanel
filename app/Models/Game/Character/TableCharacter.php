<?php

namespace App\Models\Game\Character;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Functions;

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

    public function characterStatus(){
        return $this->hasMany('App\Models\Game\Log\TableAccountLog', 'characterId');
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
        return self::where('DBKey', $characterId)->with('characterGuild')->first();
    }

    public static function GetResumeCharacter($account, $characterId, $online, $lang)
    {
        $characters = self::with('characterStatus')->where('Account', $account)
        ->when(!is_null($characterId),
            function($q) use($characterId){
                $q->where('DBKey','=', $characterId);
            }
        )->get();

        if($online != null){
            foreach ($characters as $key => $character) {
                if(!empty($character->characterStatus->toArray())){
                    if($character->characterStatus[0]['onlineStatus'] == $online){
                        $character->MapId = Functions::GetNameTranslateFromXml($character->MapId, $lang);
                        $character->Class = Functions::GetClassName($character->Class);

                        return $character;
                    }
                }
            }

            return null;
        }

        return $characters;
    }
}
