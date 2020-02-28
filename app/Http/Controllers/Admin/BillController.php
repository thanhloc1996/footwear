<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BillRepositoryInterface;
use Auth;
use PDF;
use Storage;
use File;

class BillController extends Controller
{
    private $bill;
    public function __construct(
        BillRepositoryInterface $billRepository
    )
    {
        $this->bill = $billRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $view['listBill'] = $this->bill->getListBill($request->all(), $request->url());

        return view('admin.bill.list', $view);
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
    public function update(Request $request)
    {   
        $errors = [];

        $checkStatusBill = $this->bill->getDetailBill($request->bill_id);

        $updateStock = $this->bill->updateStockProduct($request->bill_id);

        if($checkStatusBill->status == 1 || $checkStatusBill->status == 4)
        {   
            if($request->status == 2){

                if($updateStock['type'] == true){

                    $updateBill = $this->bill->update(['status'=>$request->status], $request->bill_id);
                }else{

                    $updateBill = false;

                    $errors = $updateStock['data'];
                }
            }

            if($request->status == 3){

                $updateBill = $this->bill->update(['status'=>$request->status], $request->bill_id);
            }
            
        }else{

            $updateBill = false;

            return $this->dataError('Only update Processing status', $errors);
        }
        
        if($updateBill)
        {
            return $this->dataSuccess('Update Bill Successfully.');
        }else{

            return $this->dataError('Failed', $errors);
        }
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

    public function destroyMulti(Request $request)
    {
        $data["list_id"] = $request->arrid;

        $deleteMulti = $this->bill->deleteMulti($data);

        if($deleteMulti){

            return $this->dataSuccess('Delete Bill Successfully');

        }else{

            return $this->dataError('Failed');
        }
    }

    public function exportPDF(Request $request)
    {   
        if(empty($request->bill_id))
        {
            return $this->dataError('Failed');
        } 

        $bill = $this->bill->getDetailBill($request->bill_id);

        $view['bill'] = $bill; 

        $pdfFile = PDF::loadView('admin.bill.template_export', $view);

        $pdfFile = $pdfFile->output();

        $created_at = $bill->created_at;

        $newDate = date("d-m-Y", strtotime($created_at));

        $fileName = 'bill'.$bill->user->username.$newDate.'.pdf';

        $check = File::put(public_path().'/upload/pdf/'.$fileName, $pdfFile);

        if(!empty($check))
        {
            return $this->dataSuccess('Export successfully', ['url'=>'/upload/pdf/'.$fileName]);
        }
        return $this->dataError('Failed');
    }
}
