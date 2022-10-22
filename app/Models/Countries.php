<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
