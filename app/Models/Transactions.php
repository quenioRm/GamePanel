<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop\ShopItems;
use Illuminate\Support\Facades\Auth;

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
        'status_code',
        'payment_intent'
    ];

    public static function MakeNew($packageId, $transactionId, $amount)
    {
        $package = ShopItems::find($packageId);

        if($package){

            $payment = new Transactions();
            // $payment->name = $package->name;
            // $payment->description = $package->description;
            $payment->accountId = Auth::user()->id;
            $payment->price = $package->price;
            $payment->amount = $amount;
            $payment->payment_intent = $transactionId;
            $payment->code = $transactionId;
            $payment->status_code = 0;
            $payment->status = 'complete';
            $payment->shopItemId = $package->id;
            $payment->save();

            return 0;
        }

        return -1;
    }
}
