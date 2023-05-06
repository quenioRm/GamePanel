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
        $user = self::where('email', $email)->latest('created_at')->first();
        if($user){
            $days = $user->created_at->diffInDays(now());
            $hours = $user->created_at->diffInHours(now()->subDays($days));

            dd($hours);

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
