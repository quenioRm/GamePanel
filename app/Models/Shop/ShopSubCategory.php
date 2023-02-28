<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopSubCategory extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "shopsubcategory";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'categoryId', 'name'
    ];

    public function shopCategory(){
        return $this->belongsTo('App\Models\Shop\ShopCategory', 'categoryId');
    }

    public function shopItems(){
        return $this->hasMany('App\Models\Shop\ShopItems', 'subcategoryId');
    }
}
