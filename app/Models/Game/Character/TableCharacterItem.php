<?php

namespace App\Models\Game\Character;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableCharacterItem extends Model
{
    use HasFactory;

    // Item Types
    // ML = Mail
    // IN = Inventory

    protected $connection = 'character';
    protected $table = "Table_CharItem";
    protected $primaryKey = 'Owner';
    // protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'Slot','Deleted','ItemSerial','StrRecordKind','Account','RecId','Amount','ClientSlot','ClientEquip',
        'Durability','ReinforceLevel','SellerDbKey','SellerName','SellPrice','RegisterDate','SoldDate','bSold','MailDbKey',
        'Belong','RemoveBelongCount','Quality','Storage','FellowDbKey','Toggle','Color','SubColor','ProducerName','ROEffect01',
        'ROEffectValue01','ROEffect02','ROEffectValue02','ROEffect03','ROEffectValue03','ROEffect04','ROEffectValue04','ROEffect05',
        'ROEffectValue05','ROEffect06','ROEffectValue06','SealedFellowEffect01','SealedFellowEValue01','SealedFellowEffect02',
        'SealedFellowEValue02','SealedFellowSlotCount','SealedFellow01','SealedFellow01_Effect01','SealedFellow01_EValue01',
        'SealedFellow01_Effect02','SealedFellow01_EValue02','SealedFellow02','SealedFellow02_Effect01','SealedFellow02_EValue01',
        'SealedFellow02_Effect02','SealedFellow02_EValue02','SealedFellow03','SealedFellow03_Effect01','SealedFellow03_EValue01',
        'SealedFellow03_Effect02','SealedFellow03_EValue02','ExpirationDate','CharItemID','ItemGrade','bSeize','SealedFellowEffect03',
        'SealedFellowEValue03','SealedFellow01_Effect03','SealedFellow01_EValue03','SealedFellow02_Effect03','SealedFellow02_EValue03',
        'SealedFellow03_Effect03','SealedFellow03_EValue03','SealedFellowEffect04','SealedFellowEValue04','SealedFellow01_Effect04',
        'SealedFellow01_EValue04','SealedFellow02_Effect04','SealedFellow02_EValue04','SealedFellow03_Effect04','SealedFellow03_EValue04',
        'SealedFellow01_ExpirationDate','SealedFellow02_ExpirationDate','SealedFellow03_ExpirationDate','CarvedPeriodDate','OverriseCount',
        'ReverseReinforceAttemptCount','ReverseReinforceCount','ROEffect07','ROEffectValue07','SealedFellow04','SealedFellow04_Effect01',
        'SealedFellow04_EValue01','SealedFellow04_Effect02','SealedFellow04_EValue02','SealedFellow04_Effect03','SealedFellow04_EValue03',
        'SealedFellow04_Effect04','SealedFellow04_EValue04','SealedFellow04_ExpirationDate','SealedFellow01_ReinforceLv','SealedFellow02_ReinforceLv',
        'SealedFellow03_ReinforceLv','SealedFellow04_ReinforceLv','KeyValueA','WeaponAwakenAttackValue','WeaponAwakenSkillRecID','WeaponAwakenSkillLevel',
        'WeaponAwakenEffectParam','WeaponAwakenEffectValue','WeaponAwakenRecID1','WeaponAwakenCount1','WeaponAwakenCount2','Level','Exp',
    ];

    public function character(){
        return $this->hasMany('App\Models\Game\Character\TableCharacter', 'DBKey');
    }

}
