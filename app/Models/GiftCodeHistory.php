<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCodeHistory extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "giftCodeHistory";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'giftCodeId',
        'userNo',
    ];
}
