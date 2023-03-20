<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserSession extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "sessions";
    protected $primaryKey = 'id';
    // protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',
        'language'
    ];

    public $timestamps = false;

    public static function UpdateSessionLanguage($lang)
    {
        $session = self::where('user_id', Auth::user()->id)->first();
        if($session){
            $session->language = $lang;
            $session->save();
        }
    }
}
