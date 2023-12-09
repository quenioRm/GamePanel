<?php

namespace App\Models\Game\BlackDesert\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblBriefUserInformation extends Model
{
    use HasFactory;

    protected $connection = 'game';
    protected $table = "PaGamePrivate.TblBriefUserInformation";
    protected $primaryKey = '_userNo';
    protected $dates = [
        '_registerDate', '_lastLogoutTime', '_playResetTimePerDay', '_starterPackageBuffExpiration',
        '_premiumPackageBuffExpiration', '_customizationPackageBuffExpiration', '_guildJoinableTime',
        '_lastServantMixTime', '_lastServantBuyTime', '_cashItemSaleCountResetTime', '_remainKeepTime',
        '_adventureExpiration', '_lastFairyRespawnTime'
    ];

    protected $fillable = [
        '_registerDate',
        '_userId',
        '_userNickname',
        '_lastLoginTime',
        '_lastLogoutTime',
        '_totalPlayTime',
        '_pcRoomPlayTimePerDay',
        '_playResetTimePerDay',
        '_playTimePerDay',
        '_accumulatePcRoomPlayTime',
        '_lastIp',
        '_lastCharacterNo',
        '_isPcSwitching',
        '_isFirstLogin',
        '_accumulatedLoginCount',
        '_enterServerNo',
        '_explorationPoint',
        '_characterCreationCount',
        '_isPvpAble',
        '_affiliatedTerritoryKey',
        '_userBasicCacheSeqNo',
        '_variedCharacterSlotCount',
        '_starterPackageBuffExpiration',
        '_premiumPackageBuffExpiration',
        '_customizationPackageBuffExpiration',
        '_pearlPackageBuffRemainMinute',
        '_guildJoinableTime',
        '_newFriend',
        '_newRequestFriend',
        '_lastServantMixTime',
        '_lastServantBuyTime',
        '_preGuildActivity',
        '_userIntroduction',
        '_tradeSupplyCount',
        '_cashItemSaleCount',
        '_cashItemSaleCountResetTime',
        '_remainKeepTime',
        '_keepItemKey',
        '_keepItemPriceRate',
        '_accumulatedAdvantageofTrade',
        '_adventureNo',
        '_adventureExpiration',
        '_adventureTotalScore',
        '_adventureEnd',
        '_ddTerritoryKey',
        '_lastFairyRespawnTime',
        '_plunderGameVoteCount',
        '_expeditionSupplyPoint',
        '_isGhostMode',
        '_isUpdatePremiumBuffBySystem',
        '_platformType',
        '_familyInventorySlotCount',
        '_seasonPass',
        '_oceanTendency',
        '_dwellingCount',
        '_maxWp',
        '_familyInventoryWeight'
    ];

    public $timestamps = false;
}
