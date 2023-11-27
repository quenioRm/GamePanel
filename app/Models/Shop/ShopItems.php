<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopItems extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "shopitems";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'subcategoryId', 'itemId', 'name', 'description', 'price', 'available', 'percentOff'
    ];

    // public function shopSubCategory(){
    //     return $this->belongsTo('App\Models\Shop\ShopCategory', 'subcategoryId');
    // }
}
