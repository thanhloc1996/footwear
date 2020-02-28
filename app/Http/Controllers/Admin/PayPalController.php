<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PayPalService;

class PayPalController extends Controller
{

    private $paypalSvc;

    public function __construct(PayPalService $paypalSvc)
    {
        // parent::__construct();

        $this->paypalSvc = $paypalSvc;
    }

    public function paymentList()
    {
        $view['paymentList'] = $this->paypalSvc->getPaymentList();
        // dd($view['paymentList']);
        return view('admin.paypal.check', $view);
    }

    public function searchPayPal(Request $request)
    {
        $paypal_id = trim($request->paypal_id);

        $paypal = $this->paypalSvc->getPaymentDetails($paypal_id);
        
        if($paypal)
        {   
            return $this->dataSuccess('Success', $paypal->toArray()); 
        }
        return $this->dataError('Failed');
    }

    // public function getListIdPaypal(Request $request)
    // {
    //     $search = $request->search;

    //     $paymentList = $this->paypalSvc->getPaymentList();

    //     $paymentListID  = collect($paymentList->payments)->filter(function ($item) use ($search) {

    //         return false !== stristr($item->id, $search);
    //     });


    //     $paymentListID = array_slice(array_column($paymentList->payments, 'id'), 0, 4);

    //     if($paymentListID){

    //         return $this->dataSuccess('Success', $paymentListID);
    //     }

    //     return $this->dataError('Failed', []);
    // }
}