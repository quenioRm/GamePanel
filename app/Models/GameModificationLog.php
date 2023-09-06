<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameModificationLog extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "gamemodificationslog";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'user_id',
        'directory',
        'filename'
    ];


    public static function MakeLog($input)
    {
        $log = new GameModificationLog();
        $log->user_id = $input['user_id'];
        $log->directory = $input['directory'];
        $log->filename = $input['filename'];
        $log->save();

        return "Salvo com sucesso";
    }

}
