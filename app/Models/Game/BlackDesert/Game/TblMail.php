<?php

namespace App\Models\Game\BlackDesert\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblMail extends Model
{
    use HasFactory;

    protected $connection = 'game';
    protected $table = "PaGamePrivate.TblMail";
    protected $primaryKey = '_mailNo';
    protected $dates = ['_registerDate', '_expirationDate', '_deletedDate'];
    protected $fillable = [
        '_registerDate',
        '_senderName',
        '_senderUserNo',
        '_receiverName',
        '_receiverUserNo',
        '_title',
        '_contents',
        '_mailType',
        '_variousNo',
        '_enchantLevel',
        '_itemCount',
        '_expirationDate',
        '_deletedDate',
        '_webItemType',
        '_chargeNo'
    ];

    public $timestamps = false;
}
