<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "transactions";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'accountId',
        'code',
        'shopItemId',
        'amount',
        'price',
        'status',
        'status_code'
    ];
}
