<?php

namespace App\Models\Game\BlackDesert\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblShoLog extends Model
{
    use HasFactory;

    protected $connection = 'game';
    protected $table = "TblShoLog";
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = [
        'accountNo',
        'userIp',
        'characterName',
        'worldNo',
        'cashProductNo',
        'cashProductName',
        'onePrice',
        'count',
        'isGift',
        'toCharacterName'
    ];
}
