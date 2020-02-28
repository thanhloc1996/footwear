<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Cart;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\ProductDetailRepositoryInterface;

class RestoreCart
{   
    private $productDetail;
    public function __construct(
        ProductDetailRepositoryInterface $productDetailRepository
    )
    {
        $this->productDetail = $productDetailRepository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if (Auth::check()){

            $identifier = $request->user()->id.$request->user()->username.$request->user()->email.$request->user()->id;

            Cart::restore($identifier);

            // Cart::destroy();
            Cart::store($identifier);

            // dd(Cart::content());
            //Update cart if Product deleted
            // $cart = Cart::content();
            // // dd(Cart::content());
            // foreach($cart as $item){
            //     if(!$this->productDetail->checkProductExist($item->options->product_detail->id)){

            //         Cart::remove($item->rowId);
            //     }
            // }

            // DB::table('cart')->where('identifier', 'LIKE', '%'.$identifier.'%')->delete();

            // Cart::store($identifier);

            // Cart::restore($identifier);

            return $next($request);

        }else{

            // Cart::destroy();

            return $next($request);
        }
    }
}
