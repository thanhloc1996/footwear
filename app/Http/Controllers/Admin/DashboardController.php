<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\BillRepositoryInterface;

class DashboardController extends Controller
{   
    private $product;
    private $user;
    private $bill;
    public function __construct(
        ProductRepositoryInterface $productRepository,
        BillRepositoryInterface $billRepository,
        UserRepositoryInterface $userRepository
    )
    {
        $this->product = $productRepository;
        $this->user = $userRepository;
        $this->bill = $billRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $view['listTopProduct'] = $this->product->listTopProduct(3);

        $view['listNewProduct'] = $this->product->listNewProduct();

        $view['listLatestUser'] = $this->user->listLatestUser();
        
        $query['per_page'] = 10;

        $view['listBill'] = $this->bill->getListBill($query, $request->url());
        // dd($view['listBill']);

        return view('admin.dashboard.main', $view);
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
    public function show($id)
    {
        //
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

    public function getStatistical()
    {   
        $view['listTopProduct'] = getPercentProduct($this->product->listTopProduct(10));

        $view['countProductWeek'] = $this->product->countProductWeek();
        // dd($view['countProductWeek']);
        return view('admin.statistical.main', $view);
    }
}
