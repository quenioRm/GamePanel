<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "users_avatar";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'category',
        'language',
        'name',
        'description',
        'image_url',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public static function MakeNew()
    {
        if(Storage::disk('news')->exists('tutorial.pdf')){

        }

    }

}
