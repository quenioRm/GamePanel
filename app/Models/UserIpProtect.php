<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserIpProtect extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "user_ip_protect";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'email',
        'ip',
        'isEnabled'
    ];

    public static function SetIpProtect($isIpCheck)
    {
        $ip = self::where('email', Auth::user()->email)->first();
        if($ip){
            $ip->ip = Auth::user()->ip;
            $ip->isEnabled = $isIpCheck;
            $ip->updated_at = now();
            $ip->save();
        }else{
           $ip = new UserIpProtect();
           $ip->email = Auth::user()->email;
           $ip->ip = Auth::user()->ip;
           $ip->isEnabled = $isIpCheck;
           $ip->save();
        }
    }   

    public static function CheckIpProtect($email, $ip)
    {
        $user = self::where('email', $email)->first();
        if($user){
            if($user->isEnabled == 0)
                return 0;

            if($user->isEnabled == 1 && $ip != $user->ip)
                return -1;
        }
        return 0;
    }
}
