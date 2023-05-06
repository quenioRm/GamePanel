<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResetPasswordLog extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "users_reset_password_log";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'email'
    ];

    public static function MakeLog($email)
    {
        $user = self::where('email', $email)->first();
        if($user){
            $days = $user->created_at->diffInDays($user->updated_at);
            $hours = $user->created_at->diffInHours($user->updated_at->subDays($days));

            dd($user);

            if($hours < 1){
                return -1;
            }
        }

        $user = new UserResetPasswordLog();
        $user->email = $email;
        $user->save();

        return 0;
    }
}
