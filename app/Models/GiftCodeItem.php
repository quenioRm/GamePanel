<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCodeItem extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "giftCodeItem";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'giftCodeId',
        'itemId',
        'enchantLevel',
        'itemCount',
    ];
}
