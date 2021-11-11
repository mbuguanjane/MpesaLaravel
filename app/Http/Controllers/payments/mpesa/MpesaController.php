<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MpesaController extends Controller
{
    //
    public function getAccessToken(){
        $url=env('MPES_ENV')==0
        ?'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
        :'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $curl = curl_init($url);
        curl_setopt_array(
            $curl,
              array(
                  CURLOPT_HTTPHEADER=>['Content-Type:application/json; charset=utf8'],
                  CURLOPT_RETURNTRANSFER=>True,
                  CURLOPT_HEADER=>FALSE,
                  CURLOPT_USERPWD=> env('MPESA_CONSUMER_KEY').':'.env('MPESA_CONSUMER_SECRET')
              )
              );
              $response = curl_exec($curl);
              curl_close($curl);
              $result = json_decode($response);
              return $result->access_token;
             
    }
    public function makeHttp($url,$body)
    {
        $curl = curl_init($url);
        curl_setopt_array(
            $curl,
              array(
                  CURLOPT_HTTPHEADER=>array('Content-Type:application/json',
                                   'Authorization:Bearer '.$this->getAccessToken()),
                  CURLOPT_RETURNTRANSFER=>True,
                  CURLOPT_POST=>FALSE,
                  CURLOPT_POSTFIELDS=> json_encode($body)
              )
              );
              $response = curl_exec($curl);
              curl_close($curl);
              return $response;
    }
     //register URLs
     public function RegisterURLS()
     {
        
         $url=env('MPES_ENV')==0
         ?'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
         :'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
 
         $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
            $body = array(
                //Fill in the request parameters with valid values
                'ShortCode' => env('MPESA_SHORTCODE'),
                'ResponseType' => 'Completed',
                'ConfirmationURL' =>env('MPESA_TEST_URL').'/api/confirmation',
                'ValidationURL' => env('MPESA_TEST_URL').'/api/validation',
            );
            $response=$this->makeHttp($url,$body);
            return $response;
     }
     //simulate transcations
    public function SimulateTranscation(Request $request)
    {
        $url=env('MPES_ENV')==0
        ?'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate'
        :'https://api.safaricom.co.ke/mpesa/c2b/v1/simulate';
         
        $body = array(
               'ShortCode' => env('MPESA_SHORTCODE'),
               'CommandID' => 'CustomerPayBillOnline',
               'Amount' => $request->amount,
               'Msisdn' => env('MPESA_TEST_MSISDN'),
               'BillRefNumber' => $request->account
        );    
        $response=$this->makeHttp($url,$body);
          return $response;
         
    }
    //stk Transction
    public function STKTranscation(Request $request)
    {
        $url=env('MPES_ENV')==0
        ?'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
        :'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        date_default_timezone_set('Africa/Nairobi');
        $timestamp=date('YmdHis');
        $password=env('MPESA_STK_SHORTCODE').env('MPESA_PASSKEY').$timestamp;
              
        $body = array(
            //Fill in the request parameters with valid values
            'BusinessShortCode'=> env('MPESA_STK_SHORTCODE'),
            'Password' => base64_encode($password),
            'Timestamp' => date('YmdHis'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $request->amount,
            'PartyA' => $request->phone,
            'PartyB' => env('MPESA_STK_SHORTCODE'),
            'PhoneNumber' => $request->phone,
            'CallBackURL' => env('MPESA_TEST_URL').'/api/stkPushUrl',
            'AccountReference' => 'yesman',
            'TransactionDesc' => 'yesman'
        );
        
          $response=$this->makeHttp($url,$body);
          return $response;
    }
    //B2c Transction
    public function B2CTranscation(Request $request)
    {
        $url=env('MPES_ENV')==0
        ?'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest'
        :'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
   
        $body = array(
            //Fill in the request parameters with valid values
            "InitiatorName"=> env('MPESA_B2C_INITIATOR'),    
            "SecurityCredential"=>env('MPESA_B2C_PASSWORD'), 
            "CommandID"=> "SalaryPayment",    
            "Amount"=>$request->amount,    
            "PartyA"=> env('MPESA_SHORTCODE'),    
            "PartyB"=> $request->phone,    
            "Remarks"=> $request->remarks,    
            "QueueTimeOutURL"=> env('MPESA_TEST_URL').'/api/b2cresults',    
            "ResultURL"=> env('MPESA_TEST_URL').'/api/b2ctimeout',    
            "Occassion"=> $request->occasion
        );
        
          $response=$this->makeHttp($url,$body);
          return $response;
    }

}
