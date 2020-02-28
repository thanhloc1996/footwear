<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BrandRepositoryInterface;

class BrandController extends Controller
{
    private $brand;
    public function __construct(
        BrandRepositoryInterface $brandRepository
    )
    {
        $this->brand = $brandRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $view['listBrand'] = $this->brand->getListBrand();

        return view('admin.brand.list', $view);
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
        $rules = [
            'name' => 'required'
        ];

        $messages = [ 
            'name.required'=> 'Name Brand is required.'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);

        $array = [];

        if ($validator->fails()) {

            $data_errors = $validator->errors();

            foreach ($data_errors->messages() as $key => $error){

                $array[] = ['key' => $key, 'mess' => $error];
            }

            return $this->dataError('Errors', $array);

        }else{

            $checkValidation = true;

            if($request->hasFile('image')){
                //File Validation
                $exeFile = $request->image->getClientOriginalExtension();

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
                    $array[] = ['key' => 'image', 'mess' => ["You must upload image."]];
                    break;
                }
            }

            if(!$checkValidation){

                return $this->dataError('Errors', $array);
            }

            $data['name'] = $request->name;

            if($request->hasFile('image'))
            {   
                $imageFile = $request->file('image');

                $imageName = 'upload/' . time() . str_replace(" ","",$imageFile->getClientOriginalName());;

                $imageFile->move(public_path('upload/'), $imageName);

                $data['image'] = $imageName;
            }

            $saveBrand = $this->brand->save($data);

            if($saveBrand){

                return $this->dataSuccess('Add Brand Successfully.');
            }
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
    public function update(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];

        $messages = [ 
            'name.required'=> 'Name Brand is required.'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);

        $array = [];

        if ($validator->fails()) {

            $data_errors = $validator->errors();

            foreach ($data_errors->messages() as $key => $error){

                $array[] = ['key' => $key, 'mess' => $error];
            }

            return $this->dataError('Errors', $array);

        }else{

            $checkValidation = true;

            if($request->hasFile('image')){
                //File Validation
                $exeFile = $request->image->getClientOriginalExtension();

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
                    $array[] = ['key' => 'image', 'mess' => ["You must upload image."]];
                    break;
                }
            }

            if(!$checkValidation){

                return $this->dataError('Errors', $array);
            }

            $data['name'] = $request->name;

            if($request->hasFile('image'))
            {   
                $imageFile = $request->file('image');

                $imageName = 'upload/' . time() . str_replace(" ","",$imageFile->getClientOriginalName());;

                $imageFile->move(public_path('upload/'), $imageName);

                $data['image'] = $imageName;
            }

            $saveBrand = $this->brand->update($data, $request->brand_id);

            if($saveBrand){

                return $this->dataSuccess('Update Brand Successfully.');
            }
        }
        return $this->dataError('Errors', $array);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = $this->brand->delete($request->brand_id);

        if($delete){

            return $this->dataSuccess('Delete Brand Successfully');

        }else{

            return $this->dataError('Failed');
        }
    }
}
