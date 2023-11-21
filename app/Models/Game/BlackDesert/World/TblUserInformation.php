<?php

namespace App\Models\Game\BlackDesert\World;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblUserInformation extends Model
{
    use HasFactory;

    protected $connection = 'world';
    protected $table = "PaGamePrivate.TblUserInformation";
    protected $primaryKey = '_userNo';
    protected $dates = ['_registerDate', '_authenticExpiration', '_lastLoginTime','_lastLogoutTime',
                       '_expirationDate', '_speedServerExpiration', '_accountExpirationDate', '_shutDownTime'
    ];
    protected $fillable = [
        '_registerDate',
        '_userId',
        '_userNickname',
        '_password',
        '_paymentPassword',
        '_authenticKey',
        '_authenticExpiration',
        '_webAuthenticKey',
        '_lastLoginTime',
        '_lastLogoutTime',
        '_totalPlayTime',
        '_lastIp',
        '_lastServerNo',
        '_lastWorldNo',
        '_serviceType',
        '_failPasswordCount',
        '_publisherCryptToken',
        '_membershipType',
        '_isAdmissionToSpeedServer',
        '_isPcRoom',
        '_expirationDate',
        '_isGuestAccount',
        '_speedServerExpiration',
        '_accountExpirationDate',
        '_surveyHWAndSW',
        '_isAccessBlanceChannel',
        '_isPremiumChannelPermission',
        '_isIgnoreCheckCustomizeOnly',
        '_preAuthenticKey',
        '_isAdultWorldUser',
        '_shutDownTime',
        '_atField',
        '_isCompleteTesterSubmit',
        '_isOtp',
        '_lastMacAddress',
        '_allCharacterTotalLevel',
        '_isAppliedNickNameChange'
    ];

    public $timestamps = false;

    public static function FindUser($uuid)
    {
        return self::where('_userId', $uuid)->first();
    }
}
