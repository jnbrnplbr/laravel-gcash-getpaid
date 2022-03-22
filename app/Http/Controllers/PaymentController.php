<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class PaymentController extends Controller
{


    public function store (Request $request)
    {
        $curl = curl_init();


/*
|--------------------------------------------------------------------------
|   Payment Request Data 
|--------------------------------------------------------------------------
|  As example the data below are statically added to the source code except
|  the 'amount' and 'description' but as best practice it should be place
|  inside your environment variable file and access it.
| 
|  Step 1: (inside the your environment file) add the code below
|      GCASH-PUBLIC-KEY=pk_e4d467240470fffceee4e4cfb0f320f2
| 
|  Step 2: you can now access it from environment file to anywhere. 
|     instead of 
|              'x-public-key'   => 'pk_e4d467240470fffceee4e4cfb0f320f2', 
|     use this
|              'x-public-key'   => env('GCASH-PUBLIC-KEY')
|
*/
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://g.payx.ph/payment_request',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'x-public-key'          => 'pk_e4d467240470fffceee4e4cfb0f320f2', 
                'webhooksuccessurl'     => 'https://gcash.aryasanjoseno.com/payment/success',
                'webhookfailurl'        => 'https://gcash.aryasanjoseno.com/payment/fail',
                'redirectsuccessurl'    => 'https://gcash.aryasanjoseno.com/payment/success',
                'redirectfailurl'       => 'https://gcash.aryasanjoseno.com/payment/success',
                'amount' => $request->input('amount'),
                'description' => $request->input('description'),
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

/* 
|-----------------------------------------------------------------------------------------
|   Getpaid Payment Request Response Data
|-----------------------------------------------------------------------------------------
|
|  1. json_decode() formats the response data from string to array with json data wrapper
|  2. Arr::collapse() removes the json data wrapper to easily access the response data 
|     with its associated key name. eg. $response['request_id']
|  3. Store the Payment Request to the database and redirect the use to the payment page
|    
|   Important Note: It is important to record the payment request and update it depending
|                   on the result of the payment that is given on a certain time.
|
*/

                
            $response = Arr::collapse(json_decode($response,true)); 

            return $response['request_id'];

            /*
                // Supposed that I have Payment Model        
                $payment = Payment::create([
                    'request_id'    => $response['request_id'],
                    'user_id'       => Auth::user()->id,
                    'amount'        => $response['amount'],
                    .... 
                ]);
            
            */
    }


    public function success (Request $request)
    {
        return $request;
    }
}
