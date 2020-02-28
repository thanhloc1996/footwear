<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\PayPalService as PayPalSvc;
use Cart;
use Carbon\Carbon;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\ProductDetailRepositoryInterface;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ColorRepositoryInterface;
use App\Repositories\Interfaces\SpecificationRepositoryInterface;
use App\Repositories\Interfaces\BillRepositoryInterface;
use App\Repositories\Interfaces\BillDetailRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PayPalController extends Controller
{

    private $paypalSvc;
    private $product;
    private $productDetail;
    private $brand;
    private $category;
    private $color;
    private $specification;
    private $billDetail;
    private $bill;

    public function __construct(
        PayPalSvc $paypalSvc,
        ProductRepositoryInterface $productRepository,
        ProductDetailRepositoryInterface $productDetailRepository,
        BrandRepositoryInterface $brandRepository,
        CategoryRepositoryInterface $categoryRepository,
        ColorRepositoryInterface $colorRepository,
        SpecificationRepositoryInterface $specificationRepository,
        BillRepositoryInterface $billRepository,
        BillDetailRepositoryInterface $billDetailRepository
    )
    {
        // parent::__construct();
        $this->product = $productRepository;
        $this->productDetail = $productDetailRepository;
        $this->brand = $brandRepository;
        $this->category = $categoryRepository;
        $this->color = $colorRepository;
        $this->specification = $specificationRepository;
        $this->bill = $billRepository;
        $this->billDetail = $billDetailRepository;
        $this->paypalSvc = $paypalSvc;
    }

    public function index()
    {   
        $cart = Cart::content();

        foreach($cart as $item){

            $data[] = [
                'name' => $item->name . ' ('.$item->options->product_detail->name.')',
                'quantity' => $item->qty,
                'price' => $item->price
            ];
        }

        $transactionDescription = "";

        $paypalCheckoutUrl = $this->paypalSvc
        // ->setCurrency('eur')
        ->setReturnUrl(url('paypal/success'))
        ->setCancelUrl(url('/'))
        ->setItem($data)
        ->createPayment($transactionDescription);

        if ($paypalCheckoutUrl) {

            return redirect($paypalCheckoutUrl);

        } else {

            return redirect()->route('frontend.shopping_cart');
        }
    }

    public function successPaypal()
    {
        $payment = $this->paypalSvc->getPaymentStatus();
        
        if(empty($payment)){

            return redirect()->route('frontend.shopping_cart'); 

        }else{

            $cart = Cart::content();

            $date = Carbon::now();

            $temp = true;

            $dataBill['address'] = $payment->payer->payer_info->shipping_address->line1 .' '. $payment->payer->payer_info->shipping_address->state .' '. $payment->payer->payer_info->shipping_address->line1 . ' '. $payment->payer->payer_info->shipping_address->city .' '. $payment->payer->payer_info->shipping_address->country_code;
            $dataBill['note'] = $payment->payer->payer_info->email;

            $dataBill['date_delivery'] = $date->addDays(7);
            $dataBill['date_receive'] = $date->addDays(10);

            $dataBill['user_id'] = Auth::user()->id;
            $dataBill['total'] = $payment->transactions[0]->amount->total;
            $dataBill['paypal_id'] = $payment->id;
            $dataBill['status'] = 4;

            $saveBill = $this->bill->save($dataBill);

            if($saveBill){

                foreach($cart as $item){

                    $dataDetail['bill_id'] = $saveBill->id;
                    $dataDetail['product_detail_id'] = $item->options->product_detail->id;
                    $dataDetail['quantity'] = $item->qty;
                    $dataDetail['total'] = $item->price*$item->qty;
                    $dataDetail['status'] = 4;

                    $saveBillDetail = $this->billDetail->save($dataDetail);

                    if(empty($saveBillDetail))
                    {
                        $array[] = $item->options->product_detail->id;
                        $temp = false;
                    }
                }

                if($temp == false){

                    $this->bill->delete($saveBill->id);

                    return redirect()->route('frontend.shopping_cart');
                }else{

                    Cart::destroy();

                    $identifier = Auth::user()->id.Auth::user()->username.Auth::user()->email.Auth::user()->id;

                    DB::table('cart')->where('identifier', 'LIKE', '%'.$identifier.'%')->delete();

                    return redirect()->route('frontend.user_profile')->withErrors(['Your bill is cashed!']);
                }

            }else{

                return redirect()->route('frontend.shopping_cart');
            }
        }
    }
}