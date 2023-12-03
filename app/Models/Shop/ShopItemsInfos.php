<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopItemsInfos extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "shopitemsInfos";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'shopItemId', 'applicableFor', 'effects'
    ];
}
