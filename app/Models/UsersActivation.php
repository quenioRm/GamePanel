<?php

namespace App\Models;

use App\Jobs\JobAccountActivate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailActivationAccount;

class UsersActivation extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "users_activation";
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'code',
        'isActivated'
    ];

    public static function MakeActivationCode($input)
    {
        $web_tran = DB::connection('web');

        try {

            $randomNumber = random_int(100000, 999999);

            $user = self::where('email', $input['email'])->first();

            if($user){
                if($user->isActivated == 1)
                    return 0;

                $user->code = $randomNumber;
                $user->save();
            }else{
                $user = new UsersActivation();
                $user->email = $input['email'];
                $user->code = $randomNumber;
                $user->isActivated = 0;
                $user->save();
            }

            Mail::to($user->email)->send(new MailActivationAccount($user));

            // JobAccountActivate::dispatch($user)->delay(now()->addMinutes(1));
            

            // COMMIT TRAN
            $web_tran->commit();

            return 0;

        } catch (\Exception $e){
            // ROLLBACK
            $web_tran->rollback();
            throw new \Exception($e);
            return - 1;
        }
    }

    public static function ActivateAccount($email, $authkey)
    {
        $user = self::where('email', $email)->where('code', $authkey)->first();
        if($user){
            if($user->isActivated == 1)
                return 0;

            $user->isActivated = 1;
            $user->updated_at = now();
            $user->save();
            return 0;
        }
        return -1;
    }

    public static function CheckIsActivated($email, $authkey)
    {
        $user = self::where('email', $email)->where('code', $authkey)->first();
        if($user){
            if($user->isActivated == 1)
                return 0;
            
            if($user->created_at->diffInHours(now(), false) > 1)
                return -2;
        }
        return -1;
    }

    public static function FindConfirmationCode($email, $authkey)
    {
        $user = self::where('email', $email)->where('code', $authkey)->first();
        if($user){            
            if($user->created_at->diffInHours(now(), false) > 1)
                return -2;

            return 0;
        }
        return -1;
    }
}
