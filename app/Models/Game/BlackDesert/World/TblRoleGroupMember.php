<?php

namespace App\Models\Game\BlackDesert\World;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game\BlackDesert\World\TblUserInformation;

class TblRoleGroupMember extends Model
{
    use HasFactory;

    protected $connection = 'world';
    protected $table = "PaGamePrivate.TblRoleGroupMember";
    protected $primaryKey = '_userNo';
    protected $fillable = [
        '_roleGroupNo',
        '_macAddress',
        '_ipAddress',
        '_password',
        '_passwordUpdateDate',
        '_prevPassword1',
        '_prevPassword2',
        '_prevPassword3'
    ];

    public $timestamps = false;

    public static function UpdateGmIP($userNo, $ip)
    {

        $user = TblUserInformation::where('_userNickname', $userNo)->first();
        if($user == null)
            return -1;

        $account = self::where('_userNo', $user->_userNo)->first();
        if($account){
            $account->_ipAddress = $ip;
            $account->save();
            return 0;
        }

        return -2;

    }
}
