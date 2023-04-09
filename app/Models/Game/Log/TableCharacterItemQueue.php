<?php

namespace App\Models\Game\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game\Character\TableCharacterItem;
use App\Models\Game\Log\TableAccountLog;
use App\Models\Game\Character\TableCharacter;
use DB;

class TableCharacterItemQueue extends Model
{
    use HasFactory;

    protected $connection = 'log';
    protected $table = "Table_CharItem";
    protected $primaryKey = 'id';
    // protected $dates = ['created_at','updated_at'];

    public $timestamps = false;

    protected $fillable = [
        'Owner', 'Slot','Deleted','ItemSerial','StrRecordKind','Account','RecId','Amount','ClientSlot','ClientEquip',
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


    public static function MoveItemToQueue($input)
    {
        $log_tran = DB::connection('log');
        $log_tran->beginTransaction();

        $character_tran = DB::connection('character');
        $character_tran->beginTransaction();

        try {

            if(isset($input[0]['Amount']) == null || isset($input[1]['AmountSell']) == null)
                return -2;

            $status = TableAccountLog::CheckAccountIsOnline($input[0]['Owner']);
            if($status > 0)
                return -10;

            $totalAmount = intval($input[0]['Amount']);
            $sellAmount = intval($input[1]['AmountSell']);

            if($totalAmount < $sellAmount){
                return -1;
            }

            $input[0]['Amount'] = intval($input[1]['AmountSell']);

            $item = new TableCharacterItemQueue();
            $item->fill($input[0]);
            $item->save();

            TableCharItemSellStatus::MakeNewRegister($input[1]['userId'], $item->id, $input[1]['price']);

            $findItemInCharacter = TableCharacterItem::where('Owner', $input[0]['Owner'])->where('RecId', $input[0]['RecId'])
            ->where('Slot', $input[0]['Slot'])->where('StrRecordKind', $input[0]['StrRecordKind'])->first();

            if($findItemInCharacter){

                if($findItemInCharacter->Deleted == 1)
                    return -3;

                $totalRest = $findItemInCharacter->Amount - $sellAmount;

                if($totalRest == 0)
                    $findItemInCharacter->Deleted = 1;

                $findItemInCharacter->Amount = $totalRest;
                $findItemInCharacter->save();
            }

            $log_tran->commit();
            $character_tran->commit();

            return 0;

        } catch (\Exception $e){
            // ROLLBACK
            $log_tran->rollback();
            $character_tran->rollback();
            return -15;
            throw new \Exception($e);
        }
    }

    public static function CancelSellAndRemoveFromQueue($sellId)
    {
        $log_tran = DB::connection('log');
        $log_tran->beginTransaction();

        $character_tran = DB::connection('character');
        $character_tran->beginTransaction();

        try {

            $findSell = TableCharItemSellStatus::FindSell($sellId);

            if($findSell){

                $findItemInQueue = self::find($findSell->charItemSelliD);

                if($findSell->sellStatus == 0){

                    if($findItemInQueue){

                        $status = TableAccountLog::CheckAccountIsOnline($findItemInQueue->Owner);
                        if($status > 0)
                            return -10;

                        $findItemInCharacter = TableCharacterItem::FindItemInInventory($findItemInQueue->Owner, $findItemInQueue->RecId);

                        if($findItemInCharacter){

                            $findItemInCharacter->Amount += $findItemInQueue->Amount;
                            $findItemInCharacter->save();

                        }else{

                            $findItemInQueue->StrRecordKind = "ml";
                            $slot = TableCharacterItem::GetMaxSlotByItemType($findItemInQueue->Owner, "ml");
                            $maxItemId = TableCharacterItem::GetMaxItemId();

                            if($slot == null){
                                $findItemInQueue->Slot = 0;
                            }else{
                                $findItemInQueue->Slot = $slot + 1;
                            }

                            if($maxItemId == null){
                                $findItemInQueue->CharItemID = 1;
                            }else{
                                $findItemInQueue->CharItemID = $maxItemId + 1;
                            }

                            TableCharacterItem::MakeNew($findItemInQueue->toArray());
                        }

                        $findSell->sellStatus = 2;
                        $findSell->updated_at = now();
                        $findSell->save();
                    }

                }elseif ($findSell->sellStatus == 1){
                    return -1;
                }elseif ($findSell->sellStatus == 2){
                    return -2;
                }
            }

            $log_tran->commit();
            $character_tran->commit();

            return 0;

        } catch (\Exception $e){
            // ROLLBACK

            $log_tran->rollback();
            $character_tran->rollback();

            return -15;
            throw new \Exception($e);
        }
    }

    public static function MoveItemToBuyer($sellId, $characterBuyerId)
    {
        $log_tran = DB::connection('log');
        $log_tran->beginTransaction();

        $character_tran = DB::connection('character');
        $character_tran->beginTransaction();

        try {

            $status = TableAccountLog::CheckAccountIsOnline($characterBuyerId);
            if($status > 0)
                return -10;

            $findSell = TableCharItemSellStatus::FindSell($sellId);

            if($findSell){

                //Account
                $findAccountBychar = TableCharacter::FindAccountByCharacter($characterBuyerId);
                if($findAccountBychar == null)
                    return -26;

                //Check Money
                $money = TableAccountMoney::GetCurrentMoney($findAccountBychar->Account);
                $moneyCalc = floatval($money) - floatval($findSell->price);
                if($moneyCalc < 0)
                    return - 25;
                ///

                // Check is same account
                if($findAccountBychar->Account == $findSell->accountId)
                    return -27;

                $findItemInQueue = self::find($findSell->charItemSelliD);

                if($findSell->sellStatus == 0){

                    if($findItemInQueue){

                        $findItemInCharacter = TableCharacterItem::FindItemInInventory($characterBuyerId, $findItemInQueue->RecId);

                        if($findItemInCharacter){

                            $findItemInCharacter->Amount += $findItemInQueue->Amount;
                            $findItemInCharacter->save();

                        }else{

                            $slot = TableCharacterItem::GetMaxSlotByItemType($characterBuyerId, "ml");
                            $maxItemId = TableCharacterItem::GetMaxItemId();

                            $findItemInQueue->Owner = $characterBuyerId;
                            $findItemInQueue->StrRecordKind = "ml";

                            if($slot == null){
                                $findItemInQueue->Slot = 0;
                            }else{
                                $findItemInQueue->Slot = $slot + 1;
                            }

                            if($maxItemId == null){
                                $findItemInQueue->CharItemID = 1;
                            }else{
                                $findItemInQueue->CharItemID = $maxItemId + 1;
                            }

                            TableCharacterItem::MakeNew($findItemInQueue->toArray());
                        }
                        // update money
                        $updateMoney = TableAccountMoney::UpdateMoney($findAccountBychar->Account, $moneyCalc);

                        $findSell->sellStatus = 1;
                        $findSell->updated_at = now();
                        $findSell->save();
                    }

                }elseif ($findSell->sellStatus == 1){
                    return -1;
                }elseif ($findSell->sellStatus == 2){
                    return -2;
                }
            }

            $log_tran->commit();
            $character_tran->commit();

            return 0;

        } catch (\Exception $e){
            // ROLLBACK

            $log_tran->rollback();
            $character_tran->rollback();

            // return -15;
            throw new \Exception($e);
        }
    }
}
