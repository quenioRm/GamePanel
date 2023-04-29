<?php

namespace App\Models\Game\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game\Character\TableCharacter;
use App\Models\Game\Log\TableAccountLog;

class TableUser extends Model
{
    use HasFactory;

    protected $connection = 'user';
    protected $table = "Table_User";
    protected $primaryKey = 'Account';

    protected $keyType = 'string';

    protected $fillable = [
        'DbKey',
        'CreateDate',
        'ConnectCount',
        'LastAccessDate',
        'LastAccessWorld',
        'LastSelectedChar',
        'Discipline',
        'DisciplineExpirationDate',
        'SecondPassword',
        'LastAccessIP',
        'ExpandCharCount',
        'MakeCodeNo',
        'DisciplineDesc',
        'AccountNo',
        'PremiumServiceItemReceivedTime'
    ];

    public static function GetUserWithCharacters($dbKey)
    {
        $arrayCharacters = [];

        $user = self::where('DbKey', $dbKey)->first();
        if($user){

            $arrayCharacters = [
                'user' => $user,
                'status' => TableAccountLog::where('accountId', $dbKey)->first(),
                'characters' => TableCharacter::where('Account', $dbKey)->with(["characterItems" => function($q){
                    $q->where('Deleted', '=', 0);
                }])->get()
            ];

            return $arrayCharacters;
        }

        return null;
    }
}
