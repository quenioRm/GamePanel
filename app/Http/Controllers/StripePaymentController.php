<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Stripe\StripeClient;
use Stripe\Exception\CardException;
use App\Models\Shop\ShopItems;
use Illuminate\Support\Facades\Auth;
use App\Models\Transactions;
use App\Models\User;
use Session;

class StripePaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function session(Request $request)
    {
        $package = ShopItems::find($request->id);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => env('STRIPE_CURRENCY'),
                        'product_data' => [
                            'name' => $package->description,
                        ],
                        'unit_amount'  => $package->price * 100,
                    ],
                    'quantity'   => $request->amount,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('shop.shopindex'),
            'cancel_url'  => route('shop.shopindex'),
        ]);

        $payment = Transactions::MakeNew($request->id, $session->id, $request->amount);

        return response()->json($session->url, 200);

        // return redirect()->away($session->url);
    }

    public function success()
    {
        return "Yay, It works!!!";
    }

    public function paymentStatus(Request $request)
    {
        echo 'the cash has already been deposited before. ';

        $responseBodyAsString = $request->toArray();

        if($responseBodyAsString['data']['object']['object'] == 'charge'){
            $payment = Transactions::where('payment_intent', $responseBodyAsString['data']['object']['payment_intent'])->first();
            if($payment){
                if($responseBodyAsString['data']['object']['status'] == 'succeeded'
                && $responseBodyAsString['data']['object']['refunded'] == false && $payment->status == 0){
                    $payment->status = 1;
                    $payment->updated_at = now();
                    $payment->save();
                    echo 'cash in progress... ';
                }
            }
        }

        if($responseBodyAsString['data']['object']['object'] == 'checkout.session'
        && $responseBodyAsString['data']['object']['status'] == 'complete'
        && $responseBodyAsString['data']['object']['payment_status'] == 'paid'){
            $payment = Transactions::where('transaction_id', $responseBodyAsString['data']['object']['id'])->first();
            if($payment){
                if($payment->status == 2){
                    echo 'the cash has already been deposited before. ' . $payment->updated_at;
                }else{
                    $payment->status = 2;
                    $payment->payment_intent = $responseBodyAsString['data']['object']['payment_intent'];
                    $payment->save();

                    //TODO DEPOSIT CASH

                    $package = ShopItems::find($payment->package_id);
                    if($package){

                    }

                    // echo 'cash in account : ' . $payment->username . ' - total amount : ' . $package->cashAmount;
                }
            }
        }
    }
}
