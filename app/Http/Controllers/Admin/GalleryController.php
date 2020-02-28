<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\GalleryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class GalleryController extends Controller
{   
    private $gallery;
    private $product;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(
        ProductRepositoryInterface $productRepository,
        GalleryRepositoryInterface $galleryRepository
    )
    {
        $this->gallery = $galleryRepository;
        $this->product = $productRepository;
    }

    public function index($product_id)
    {
        $view['product'] = $this->product->showProduct($product_id);

        $view['listGallery'] = $this->gallery->getGallery($product_id);

        return view('admin.gallery.list', $view);
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
    public function store(Request $request, $product_id)
    {   
        $checkValidation = true;

        $array = [];

        $i = 0;

        foreach($request->file as $file){

            //File Validation
            $exeFile = $file->getClientOriginalExtension();

            switch($exeFile){
                case 'JPG': break;
                case 'jpg': break;
                case 'JPEG': break;
                case 'jpeg': break;
                case 'PNG': break;
                case 'png': break;
                case 'BMP': break;
                case 'bmp': break;
                case 'GIF': break;
                case 'gif': break;
                default: 
                $checkValidation = false;
                $array[] = ['key' => 'file'.$i, 'mess' => ["You must upload image."]];
                break;
                }

            $i++;            
        }
        
        if(!$checkValidation){

            return $this->dataError('Errors', $array);
        }

        $j = 0;

        foreach($request->file as $file){

            $dataSave['product_id'] = $product_id;

            $imageName = 'upload/' . time() . str_replace(" ","",$file->getClientOriginalName());;

            $file->move(public_path('upload/'), $imageName);

            $dataSave['url'] = $imageName;

            $saveGallery = $this->gallery->save($dataSave);

            if($saveGallery == false){

                return $this->dataError('Errors', 'Save Gallery fail at file'. $j); 
            }

            $j++;
        }

        if($saveGallery) {

            return $this->dataSuccess('Gallery updated');
        }
        return $this->dataError('Errors', $array);
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

    public function destroyMulti(Request $request, $product_id)
    {   

        $data["list_id"] = $request->gallery_id;

        $deleteMulti = $this->gallery->deleteMulti($data);

        if($deleteMulti){

            return $this->dataSuccess('Delete Images Successfully');

        }else{

            return $this->dataError('Failed');
        }
    }
}
