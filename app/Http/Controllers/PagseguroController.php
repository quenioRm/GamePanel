<?php

namespace App\Http\Controllers;
use PagSeguro\Configuration\Configure;
use PagSeguro\Services\Session as PagseguroSession;
use PagSeguro\Domains\Requests\Payment as PagseguroPayment;
use PagSeguro\Services\Transactions\Search\Code as PagseguroSearchCode;
use PagSeguro\Services\Transactions\Notification as PagseguroNotification;
use PagSeguro\Helpers\Xhr;
use PagSeguro\Parsers\Transaction\Response as PagseguroResponse;
use Illuminate\Http\Request;
use App\Models\Shop\ShopItems;
use Illuminate\Support\Facades\Auth;
use App\Models\Transactions;

class PagseguroController extends Controller
{
    public function __construct()
    {
        $this->_configs = new Configure();
        $this->_configs->setCharset('UTF-8');
        $this->_configs->setAccountCredentials(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'));
        $this->_configs->setEnvironment(env('PAGSEGURO_AMBIENTE'));
        $this->_configs->setLog(true, storage_path('logs/pagseguro_'. date('Ymd') .'.txt'));
    }

    public function getCredenciais()
    {
        return $this->_configs->getAccountCredentials();
    }

    public function MakeNewCode(Request $request)
    {
        try {

            $shopitem = ShopItems::find($request->id);
            $payment = new PagseguroPayment();

            $payment->setCurrency('BRL');

            //Interne Reference
            $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
            $payment->setReference($uuid);

            //pegar valores do plano selecionado na tela
            $payment->addItems()->withParameters(
                $shopitem->id,
                $shopitem->name,
                $request->amount,
                $shopitem->price * $request->amount
            );
            //pegar do usuario logado
            // $payment->setSender()->setName(Auth::user()->name);
            $payment->setSender()->setEmail(Auth::user()->email);

            $onlyCheckoutCode = true;
            $result = $payment->register($this->getCredenciais(),$onlyCheckoutCode);
            return $result->getCode();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function makeNewPayment(Request $request)
    {
        try{

            $shopItem = ShopItems::find($request->id);

            $transaction = new Transactions();
            $transaction->accountId = Auth::user()->id;
            $transaction->code = $request->code;
            $transaction->shopItemId = $shopItem->id;
            $transaction->amount = $request->amount;
            $transaction->price = $request->amount * $shopItem->price;
            $transaction->status_codigo = 1;
            $transaction->status = 'Aguardando Pagamento';

            if($pagamento->save()){
               return true;
            } else {
                throw new Exception("Error ao salvar");
            }
        } catch (Exception $e) {
           logger($e->getMessage());
        }
    }
}
