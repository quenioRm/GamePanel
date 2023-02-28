<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "shopcategory";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'name'
    ];

    public function shopSubCategory(){
        return $this->hasMany('App\Models\Shop\ShopSubCategory', 'categoryId');
    }
}
