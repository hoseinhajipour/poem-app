<?php

namespace App\Components;

use App\Models\Package;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use nusoap_client;

class OrderCheck extends Component
{
    public $message;
    public $refid;

    public function mount(Request $request)
    {
        $Authority = $request->get('Authority');
        $payment_id = $request->get('payment_id');
        $Payment = Payment::where('id', $payment_id)->first();
        $MerchantID = setting('payment.zarinpal_merchent_code');
        $Amount = $Payment->price;
        if ($request->get('Status') == 'OK') {

            $zarinpalSandbox = boolval(setting('payment.zarinpal_sandbox'));
            if ($zarinpalSandbox) {
                $client = new nusoap_client('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
            } else {
                $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
            }

            $client->soap_defencoding = 'UTF-8';
            $result = $client->call('PaymentVerification', [
                [
                    'MerchantID' => $MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $Amount,
                ],
            ]);
            if ($zarinpalSandbox) {
                $result['Status'] = 100;
            }
            if ($result['Status'] == 100) {
                if($Payment->status == "complete"){
                    $this->message = 'قبلا به موجودی شما اضافه شده است';
                }else{
                    $Payment->status = "complete";
                    $Payment->refid = $result['RefID'];
                    $Payment->save();
                    $Package = Package::where('id', $Payment->package_id)->first();
                    $user = User::where('id', $Payment->user_id)->first();
                    $user->wallet += $Package->coin;
                    $user->save();
                    $this->message = 'پرداخت با موفقیت انجام شد.';
                }
            } else {
                $Payment->status = "error";
                $Payment->save();

                $this->message = 'خطا در انجام عملیات';
            }
        } else {
            $Payment->status = "canceled";
            $Payment->save();

            $this->message = 'سفارش لغو گردید.';
        }
    }

    public function render()
    {
        return view('order-check');
    }

    public function route()
    {
        return Route::get('/order')
            ->name('order')
            ->middleware('auth');
    }
}
