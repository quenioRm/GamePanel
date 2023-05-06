<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

        (Session()->get('applocale') == null ? $lang = config('app.fallback_locale') : $lang = Session()->get('applocale'));

        dd($lang);

        return Countries::where('code_1', Auth::user()->nationCode)->where('lang',$lang)->first();
    }
}
