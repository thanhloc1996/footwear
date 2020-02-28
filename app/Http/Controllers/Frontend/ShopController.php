<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\ProductDetailRepositoryInterface;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ColorRepositoryInterface;
use App\Repositories\Interfaces\SpecificationRepositoryInterface;
use App\Repositories\Interfaces\BillRepositoryInterface;
use App\Repositories\Interfaces\BillDetailRepositoryInterface;
use Auth;
use Cart;
use Illuminate\Support\Facades\DB;
use Validator;
use Carbon\Carbon;

class ShopController extends Controller
{   
    private $product;
    private $productDetail;
    private $brand;
    private $category;
    private $color;
    private $specification;
    private $billDetail;
    private $bill;

    public function __construct(
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
        $this->product = $productRepository;
        $this->productDetail = $productDetailRepository;
        $this->brand = $brandRepository;
        $this->category = $categoryRepository;
        $this->color = $colorRepository;
        $this->specification = $specificationRepository;
        $this->bill = $billRepository;
        $this->billDetail = $billDetailRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $url = $request->url();
        $paginateQuery = $request->all();
        $query = customizeQuery($request->all());

        //Get Category for Banner
        if(!empty($request->category)){

            $view['category'] = $this->category->getCategoryById($request->category);
        }

        $view['listProduct'] = $this->product->listProduct($query, $url, $paginateQuery);
        $view['listBrand'] = $this->brand->getListBrand();
        $view['listCategory'] = $this->category->getListCategoryNotParent();
        $view['listColor'] = $this->color->getListColor();
        $view['sidebarFilter'] = $this->specification->sidebarFilter();
        //dd($view['listProduct']->lastPage());
        return view('frontend.content.shop', $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {       
        $view['product'] = $this->product->showProduct($product_id);
        
        //List Color
        $listColor = [];
        foreach($view['product']->productDetail as $key => $item){

            $listColor[] = $item->color->toArray();            
        }

        $tempListColor=array();
        foreach ($listColor as $index=>$t) {
            if (isset($tempListColor[$t["id"]])) {
                unset($listColor[$index]);
                continue;
            }
            $tempListColor[$t["id"]]=true;
        }
        $view['listColor'] = $listColor;
        
        $view['review'] = getPercentStar($view['product']->comment);

        // dd($view['product']->comment);

        return view('frontend.content.product', $view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addCart(Request $request)
    {   
        $productDetail = $this->productDetail->get($request->product_detail_id);

        $cart = Cart::content();
        // dd($cart);
        $saveCart = false;

        $cartInfo = [
            'id' => $productDetail->product->id,
            'name' => $productDetail->product->name,
            'price' => $productDetail->price,
            'qty' => $request->quantity,
            'options' => [
                'product_detail' => $productDetail
            ]
        ];
        //dd($cartInfo);
        $checkAddCart = false;
        
        if(count($cart) > 0){

            foreach($cart as $item){

                if($item->options->product_detail->id == $request->product_detail_id){

                    return $this->dataError('This product has been stored in your Cart. Do you want to go to your Cart now?');

                }else{

                    $checkAddCart = true;
                    
                }
            }

        }elseif(count($cart) == 0){

            $addCart = Cart::add($cartInfo); 
        }

        if($checkAddCart){

            $addCart = Cart::add($cartInfo); 
        }
        // dd(Cart::content());

        $identifier = $request->user()->id.$request->user()->username.$request->user()->email.$request->user()->id;

        Cart::store($identifier);
        // dd(Cart::content());
        return $this->dataSuccess('Add this product to the cart successfully.');
    }

    public function getCart(Request $request)
    {     
        $view['cart'] = Cart::content();

        $view['cartTotal'] = Cart::total();
        
        $view['user'] = Auth::user();

        return view('frontend.content.cart', $view);
    }

    public function getCartAjax()
    {
        $view['cartCount'] = Cart::count();

        $view['cartTotal'] = Cart::total();

        return $this->dataSuccess('Success', $view);
    }


    public function getSizeAjax($product_id, $color_id)
    {
        $data = $this->productDetail->getSizeByColor($product_id, $color_id);
        
        return $this->dataSuccess('Success', $data);
    }

    public function deleteCart(Request $request)
    {   
        $cart= Cart::content();
  
        foreach($cart as $item)
        {
            if(in_array($item->id,$request->arrid)){

                Cart::remove($item->rowId);
            }
        }

        $identifier = $request->user()->id.$request->user()->username.$request->user()->email.$request->user()->id;

        DB::table('cart')->where('identifier', 'LIKE', '%'.$identifier.'%')->delete();

        Cart::store($identifier);

        return $this->dataSuccess('Remove selected products successfully.');
    }

    public function updateCart(Request $request)
    {   
        if(empty($request->qty))
        {
            $request->qty = 1;
        }

        $cart= Cart::content();

        Cart::update($request->rowId, $request->qty);

        $identifier = $request->user()->id.$request->user()->username.$request->user()->email.$request->user()->id;

        DB::table('cart')->where('identifier', 'LIKE', '%'.$identifier.'%')->delete();

        Cart::store($identifier);

        return $this->dataSuccess('Update products successfully.');
    }

    public function getProductDetailAjax($color_id, $size)
    {
        $data = $this->productDetail->getProductDetailAjax($color_id, $size);
        
        return $this->dataSuccess('Success', $data);
    }

    public function postBill(Request $request)
    {
        $rules = [
            'address' =>'required',
            'phone' => 'required',
            'checkout' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        $array = [];

        if ($validator->fails()) {

            $data_errors = $validator->errors();

            foreach ($data_errors->messages() as $key => $error) {

                $array[] = ['key' => $key, 'mess' => $error];
            }

            return $this->dataError('Check your information again!', $array);

        }else{

            $cart = Cart::content();

            $date = Carbon::now();

            $temp = true;

            $dataBill['address'] = $request->address;
            $dataBill['phone'] = $request->phone;
            $dataBill['note'] = $request->note;
            $dataBill['date_delivery'] = $date->addDays(7);
            $dataBill['date_receive'] = $date->addDays(10);
            $dataBill['user_id'] = $request->user()->id;
            $dataBill['total'] = Cart::total();

            $saveBill = $this->bill->save($dataBill);

            if($saveBill){

                foreach($cart as $item){

                    $dataDetail['bill_id'] = $saveBill->id;
                    $dataDetail['product_detail_id'] = $item->options->product_detail->id;
                    $dataDetail['quantity'] = $item->qty;
                    $dataDetail['total'] = $item->price*$item->qty;

                    $saveBillDetail = $this->billDetail->save($dataDetail);

                    if(empty($saveBillDetail))
                    {
                        $array[] = $item->options->product_detail->id;
                        $temp = false;
                    }
                }

                if($temp == false){

                    $this->bill->delete($saveBill->id);

                    return $this->dataError('Save Bill Detail Failed!', $array);
                }else{

                    Cart::destroy();

                    $identifier = $request->user()->id.$request->user()->username.$request->user()->email.$request->user()->id;

                    DB::table('cart')->where('identifier', 'LIKE', '%'.$identifier.'%')->delete();

                    return $this->dataSuccess('Your bill is processing!', $saveBill);
                }
            }else{

                return $this->dataError('Save Bill Failed!', $array);
            }
        }
    }
}
