<?php

namespace App\Http\Controllers;
use PaytmWallet;
use Illuminate\Http\Request;

class PaytmController extends Controller
{
    public function pay() {

        $payment = PaytmWallet::with('receive');

        $payment->prepare([
          'order' => 47, // your order id staken from cart
          'user' => 'Cust_id_12', // your user id
          'mobile_number' => 7277407765, // your customer mobile no
          'email' => 'abx@gmail.com', // your user email address
          'amount' => 40.00, // amount will be paid in INR.
          'callback_url' => 'http://172.18.0.4:8006/payment/status' // callback URL
        ]);
        
        return $payment->receive();
    }
   

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {   
        $transaction = PaytmWallet::with('receive');
        // dd($transaction);
        $response = $transaction->response();
        // dd($response);
        // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        
        if($transaction->isSuccessful()){

        }else if($transaction->isFailed()){
          //Transaction Failed
        }else if($transaction->isOpen()){
          //Transaction Open/Processing
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id

        $transaction->getTransactionId(); // Get transaction id
    }
}
