<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;

class MPESAResponsesController extends Controller
{
    //
    public function validation(Request $request)
    {
        Log::info('validation endpoint');
        Log::info($request->all());
        
    }
    public function confirmation(Request $request)
    {
        $payment=new Payment();
        Log::info('Confirmation endpoint');
        Log::info($request->all());
        Log::info('Wendani: '.$request->TransID);
        
         $payment->TransactionType=$request->TransactionType;
         $payment->TransID=$request->TransID;
         $payment->TransTime=$request->TransTime;
         $payment->TransAmount=$request->TransAmount;
         $payment->BusinessShortCode=$request->BusinessShortCode;
         $payment->BillRefNumber=$request->BillRefNumber;
         $payment->InvoiceNumber=$request->InvoiceNumber;
         $payment->OrgAccountBalance=$request->OrgAccountBalance;
         $payment->ThirdPartyTransID=$request->ThirdPartyTransID;
         $payment->MSISDN=$request->MSISDN;
         $payment->FirstName=$request->FirstName;
         $payment->MiddleName=$request->MiddleName;
         $payment->LastName=$request->LastName;
         $payment->save();
        // return[
        //     "ResultCode"=>0, 
        //     "ResultDesc"=>"Confirmation Received Successfully",
        //     "ThirdPartyTransID"=>rand(3000,10000)
        // ];
    }
    public function stkPushUrl(Request $request)
    {
        Log::info('stkPush endpoint');
        Log::info($request->all());
        Log::info('Body: '.$request->Body['stkCallback']['CheckoutRequestID']);
        // return[
        //     "ResultCode"=>0, 
        //     "ResultDesc"=>"Confirmation Received Successfully",
        //     "ThirdPartyTransID"=>rand(3000,10000)
        // ];
    }
    public function b2cresults(Request $request)
    {
        Log::info('b2cresults endpoint');
        Log::info($request->all());
        // return[
        //     "ResultCode"=>0, 
        //     "ResultDesc"=>"Confirmation Received Successfully",
        //     "ThirdPartyTransID"=>rand(3000,10000)
        // ];
    }
    public function b2ctimeout(Request $request)
    {
        Log::info('b2ctimeout endpoint');
        Log::info($request->all());
        // return[
        //     "ResultCode"=>0, 
        //     "ResultDesc"=>"Confirmation Received Successfully",
        //     "ThirdPartyTransID"=>rand(3000,10000)
        // ];
    }
    
}
