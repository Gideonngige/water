<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function token(){
        $consumerKey = '17tijAWZQBWLRIFFuJrDGBfl1zalwr00g6wEE20cGdeHvw7l';
        $consumerSecret = 'iX29aYc7ujvLlXssKhvG2ilFzS7Bpoa5dU9SIGoPUDrdkLWwKQD1rUEOhW7BRQ3e';
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $response = Http::withOptions(['verify'=>false])->withBasicAuth($consumerKey, $consumerSecret)->get($url);
        return $response['access_token'];
    }

    public function initiateStkPush(){
        $accessToken = $this->token();
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $passKey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $BusinessShortCode=174379;
        $Timestamp = Carbon::now()->format('YmdHis');
        $password = base64_encode($BusinessShortCode.$passKey.$Timestamp);
        $TransactionType = 'CustomerPayBillOnline';
        $Amount = 1;
        $PartyA = 254797655727;
        $PartyB = 174379;
        $PhoneNumber = 254797655727;
        $CallbackUrl = 'https://www.e-skuli.co.ke/payments';
        $AccountReference = 'G-Tech';
        $TransactionDesc = 'G-Tech Payment';

        $response = Http::withOptions(['verify'=>false])->withToken($accessToken)->post($url,['BusinessShortCode'=>$BusinessShortCode,
        'Password'=>$password,
        'Timestamp'=>$Timestamp,
        'TransactionType'=>$TransactionType,
        'Amount'=>$Amount,
        'PartyA'=>$PartyA,
        'PartyB'=>$PartyB,
        'PhoneNumber'=>$PhoneNumber,
        'CallBackURL'=>$CallbackUrl,
        'AccountReference'=>$AccountReference,
        'TransactionDesc'=>$TransactionDesc,
        
    ]);

    return $response;

    }
    public function stkCallback(){

    }
}
