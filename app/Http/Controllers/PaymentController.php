<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Payment;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use nusoap_client;

class PaymentController extends Controller
{


    public function verify(Request $request)
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
                $Payment->status = "complete";
                $Payment->refid = $result['RefID'];
                $Payment->save();
                $Package = Package::where('id', $Payment->package_id)->first();
                $user = User::where('id', $Payment->user_id)->first();
                $user->coin += $Package->coin;
                $user->save();
                $message = 'پرداخت با موفقیت انجام شد.';
            } else {
                $Payment->status = "error";
                $Payment->save();

                $message = 'خطا در انجام عملیات';
            }
        } else {
            $Payment->status = "canceled";
            $Payment->save();

            $message = 'سفارش لغو گردید.';
        }

        return view('order', [
            'message' => $message,
            'refid' => $Payment->refid,
            'Payment' => $Payment,
            'status' => $Payment->status]);

    }

}
