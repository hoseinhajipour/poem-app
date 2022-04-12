<?php

namespace App\Components\Pages\Dashboard;

use App\Models\Package;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use nusoap_client;

class Shop extends Component
{
    public $Packages = [];

    public function route()
    {
        return Route::get('/shop')
            ->name('shop')
            ->middleware('auth');
    }

    public function render()
    {
        $this->Packages = Package::all();
        return view('pages.dashboard.shop');
    }

    public function Buy($package_id)
    {

        $Package = Package::where('id', $package_id)->first();
        $user = auth()->user();
        $MerchantID = setting('payment.zarinpal_merchent_code');
        $zarinpalSandbox = setting('payment.zarinpal_sandbox');

        if ($zarinpalSandbox) {
            $client = new nusoap_client('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
        } else {
            $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
        }


        $newPay = Payment::create();
        $newPay->user_id = $user->id;
        $newPay->package_id = $Package->id;
        $newPay->amount = $Package->price;
        $newPay->status = "pending";
        $newPay->save();
        $CallbackURL = url('/order?payment_id=' . $newPay->id); // Required

        $client->soap_defencoding = 'UTF-8';
        $RequestData = [
            'MerchantID' => $MerchantID,
            'Amount' => $Package->price,
            'Description' => $Package->description,
            'Email' => $user->email,
            'Mobile' => $user->phone,
            'CallbackURL' => $CallbackURL,
        ];
        $result = $client->call('PaymentRequest', [$RequestData]);

        //Redirect to URL You can do it also by creating a form
        if ($result['Status'] == 100) {
            $newPay->authority = $result['Authority'];
            $newPay->save();
            if ($zarinpalSandbox) {
                $result['url'] = 'https://sandbox.zarinpal.com/pg/StartPay/' . $result['Authority'];
            } else {
                $result['url'] = 'https://www.zarinpal.com/pg/StartPay/' . $result['Authority'];
            }


            return $this->redirect($result['url']);
        }
    }
}
