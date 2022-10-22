<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use App\Models\UsersActivation;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $connection = "web";
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'avatar_original',
        'google_id',
        'fb_id',
        'isIpCheck',
        'ip',
        'uuid'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function Register($input)
    {
        $web_tran = DB::connection('web');

        try {

            $user = new User();


            // COMMIT TRAN
            $web_tran->commit();

        } catch (\Exception $e){
            // ROLLBACK
            $web_tran->rollback();
            throw new \Exception($e);
        }
    }
}
