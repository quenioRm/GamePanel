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
        'uuid',
        'birth',
        'nationCode',
        'isBlockEmailDomain'
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

    public static function MakeUser($input)
    {
        $web_tran = DB::connection('web');

        try {

            $uuid = vsprintf('%s%s-%s-4000-8%.3s-%s%s%s0',str_split(dechex( microtime(true) * 1000 ) . bin2hex( random_bytes(8) ),4));

            $user = new User();
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->password = hash('sha512', $input['password']);
            $user->uuid = $uuid;
            $user->birth = $input['birth'];
            $user->nationCode = $input['nationCode'];
            $user->save();

            // COMMIT TRAN
            $web_tran->commit();

        } catch (\Exception $e){
            // ROLLBACK
            $web_tran->rollback();
            throw new \Exception($e);
        }
    }

    public static function MakeLogin($email, $password, $isIpCheck)
    {
        $user = self::where('email', $email)->first();
        if($user){

            if($user->isBlockEmailDomain == 1)
                return [
                    'code' => -3,
                    'data' => null
                ];

            if($user->password != hash('sha512', $password))
                return [
                    'code' => -1,
                    'data' => null
                ];

            $user->isIpCheck = $isIpCheck;
            $user->save();
            
            return [
                'code' => 0,
                'data' => $user
            ];
        }
        return [
            'code' => -2,
            'data' => null
        ];
    }

    public static function CheckIsBlocked($email)
    {
        $user = self::where('email', $email)->first();
        if($user){
            if($user->isBlockEmailDomain == 1)
                return -1;
            
            return 0;
        }
        return -2;
    }

    public static function CheckIsIpProtect($email)
    {
        $user = self::where('email', $email)->first();
        if($user){
            if($user->isIpCheck == 0)
                return -1;
            
            return 0;
        }
        return -2;
    }
}
