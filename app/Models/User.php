<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use App\Helpers\Functions;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailResetPassword;
use App\Models\UserResetPasswordLog;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAddInformation;
use App\Models\UserPasswordChangeLog;
use Location;

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
        'isBlockEmailDomain',
        'permission'
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

    public function useravatar(){
        return $this->hasMany('App\Models\UserAvatar', 'user_id');
    }

    public function userinformationadd(){
        return $this->hasMany('App\Models\UserAddInformation', 'user_id');
    }

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

    public static function MakeLogin($email, $password, $isIpCheck, $ip)
    {
        $user = null;
        $userSecondEmail = UserAddInformation::where('email', $email)->first();
        if($userSecondEmail){
            if($userSecondEmail->emailIsChecked == 0)
                return [
                    'code' => -4,
                    'data' => null
                ];

            $user = self::find($userSecondEmail->user_id);
        }else
            $user = self::where('email', $email)->first();

        if($user){

            // if(env('APP_DEBUG') == true){
            //     $ip = "177.137.4.237";
            //     $iplog = Location::get('177.137.4.237');
            // }
            // else

            $iplog = Location::get($ip);

            $checkIpProtect = UserIpProtect::CheckIpProtect($user->email, $ip);
            if($checkIpProtect == -1 && $user->isIpCheck == 1)
                return [
                    'code' => -5,
                    'data' => null
                ];

            UserLoginAccountLog::MakeLog($user->id, $iplog);

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

            //$user->isIpCheck = $isIpCheck;
            $user->ip = $ip;
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
        return 0;
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

    public static function ResetPassword($email)
    {
        $user = self::where('email', $email)->first();
        if($user){

            $password = Functions::rand_string(10);

            if($user->isBlockEmailDomain == 1)
                return [
                    'code' => -3,
                    'data' => null
                ];

            $log = UserResetPasswordLog::MakeLog($email);
            if($log == -1)
                return [
                    'code' => -1,
                    'data' => null
                ];

            $user->isIpCheck = 0;
            $user->password = hash('sha512', $password);
            $user->save();

            $userSecondEmail = UserAddInformation::where('user_id', $user->id)->first();
            if($userSecondEmail)
                Mail::to($userSecondEmail->email)->send(new MailResetPassword($password));


            Mail::to($user->email)->send(new MailResetPassword($password));

            return [
                'data' => $user,
                'code' => 0
            ];
        }
        return [
            'data' => null,
            'code' => -2
        ];
    }

    public static function UpdateProfile($username, $avatarId)
    {
        $user = self::where('id', Auth::user()->id)->first();
        if($user){
            $user->name = $username;

            $userAvatar = UserAvatar::find($avatarId);
            if($userAvatar){
                $user->avatar = $userAvatar->avatar;

            }

            $user->save();

            return[
                'data' => $user,
                'code' => 0
            ];
        }
        return [
            'data' => null,
            'code' => -1
        ];
    }

    public static function ChangePassword($password)
    {
        $user = self::where('id', Auth::user()->id)->first();
        if($user){
            $user->password = hash('sha512', $password);
            $user->save();

            UserPasswordChangeLog::MakeLog();

            return 0;
        }
        return -1;
    }

    public static function SetIpCheck($isIpCheck)
    {
        $user = self::where('id', Auth::user()->id)->first();
        if($user){
            $user->isIpCheck = $isIpCheck;
            $user->save();

            UserIpProtect::SetIpProtect($isIpCheck);
            return 0;
        }
        return -1;
    }

    public static function FindAccountByUUID($uuid)
    {
        $user = self::where('uuid', $uuid)->first();
        if($user){
            return $user;
        }
        return null;
    }
}
