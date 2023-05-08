<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class Countries extends Model
{
    protected $connection = 'web';
    protected $table = "countries";
    protected $primaryKey = 'id';
    protected $fillable = [
        'lang',
        'name',
        'code_1',
        'code_2',
        'code_3'
    ];

    public $timestamps = false;

    public static function GetCountrie()
    {
        $lang = null;

        (App::currentLocale() == null ? $lang = 'pt-BR' : $lang = App::currentLocale());

        return Countries::where('code_1', Auth::user()->nationCode)->where('lang',$lang)->first();
    }
}
