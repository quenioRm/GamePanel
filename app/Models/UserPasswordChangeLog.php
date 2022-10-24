<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserPasswordChangeLog extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "user_change_password_log";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'user_id'
    ];

    public function MakeLog()
    {
        $log = new UserPasswordChangeLog();
        $log->user_id = Auth::user()->id;
        $log->save();
    }
}
