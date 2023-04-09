<?php

namespace App\Models\Game\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableAccountLog extends Model
{
    use HasFactory;

    protected $connection = 'log';
    protected $table = "Table_Account_Login_Log";
    protected $primaryKey = 'accountId';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'id',
        'accountId',
        'characterId',
        'status',
    ];
}