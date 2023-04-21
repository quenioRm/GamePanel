<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserLoginAccountLog extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "user_login_account_log";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'user_id',
        'ip',
        'countryName',
        'countryCode',
        'countryName',
        'regionCode',
        'regionName',
        'cityName',
        'zipCode',
        'isoCode',
        'latitude',
        'longitude',
        'metroCode',
        'areaCode',
        'timezone',
    ];

    public static function MakeLog($userId, $data)
    {

        if($data == false)
            return;

        $data->zipCode = 0;

        $data->user_id = $userId;
        $log = new UserLoginAccountLog();
        $log->fill($data->toArray());
        $log->save();
    }

    public static function GetLastLog()
    {
        return self::where('user_id', Auth::user()->id)->latest()->first();
    }
}
