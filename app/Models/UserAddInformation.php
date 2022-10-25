<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserAddInformation extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "users_profile_add";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'user_id',
        'email',
        'phone_number',
        'emailIsChecked',
        'phoneIsCheked',
    ];

    public static function MakeInformationAdd($email, $phone_number)
    {
        $userInfo = self::find(Auth::user()->id);
        if($userInfo){
            if($phone_number == null && $userInfo->email != null)
                return [
                    'code' => -1,
                    'data' =>  null
                ];

            if($email != null)
               $userInfo->email = $email;

            if($phone_number != null)
               $userInfo->phone_number = $phone_number;

            $userInfo->save();
            
            return [
                'code' => 0,
                'data' =>  $userInfo
            ];

        }else{

            $userInfo = new UserAddInformation();
            $userInfo->user_id = Auth::user()->id;
            $userInfo->email = $email;
            $userInfo->phone_number = $phone_number;
            $userInfo->save();

            return [
                'code' => 0,
                'data' =>  $userInfo
            ];
        }
    }

    public static function ConfirmEmail($email, $confirmationcode)
    {
        $check = UsersActivation::FindConfirmationCode($email, $confirmationcode);
        if($check == 0){
            $userInfo = self::where('user_id', Auth::user()->id)->where('email', $email)->first();
            if($userInfo){
                $userInfo->emailIsChecked = 1;
                $userInfo->save();

                return 0;
            }
        }
        return -1;
    }
}
