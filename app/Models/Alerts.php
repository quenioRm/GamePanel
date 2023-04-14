<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerts extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "alerts";
    protected $primaryKey = 'id';
    protected $dates = ['date', 'showAfterDate', 'created_at','updated_at'];
    protected $fillable = [
        'type',
        'date',
        'showAfterDate',
        'showAfterDateBool',
        'message',
        'interactionURL'
    ];
}
