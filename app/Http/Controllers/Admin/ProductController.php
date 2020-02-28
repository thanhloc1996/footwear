<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use App\Repositories\Interfaces\ColorRepositoryInterface;
use App\Repositories\Interfaces\SpecificationRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class ProductController extends Controller
{   
    private $product;
    private $category;
    private $brand;
    private $color;
    private $specification;
    private $comment;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        ColorRepositoryInterface $colorRepository,
        SpecificationRepositoryInterface $specificationRepository,
        CommentRepositoryInterface $commentRepository,
        BrandRepositoryInterface $brandRepository
    )
    {
        $this->product = $productRepository;
        $this->category = $categoryRepository;
        $this->brand = $brandRepository;
        $this->color = $colorRepository;
        $this->specification = $specificationRepository;
        $this->comment = $commentRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $view['listNameProduct'] = $this->product->getNameAllProduct();//Auto-Complete
        $view['listProduct'] = $this->product->listProduct($request->all(), $request->url(), $request->all());

        $view['listCategory'] = $this->category->getListCategoryNotParent();
        $view['listBrand'] = $this->brand->getListBrand();

        // dd($view['listProduct']);
        return view('admin.product.list',$view);
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
            'name' => 'required',
            'status' => 'required',
            'category' => 'required',
            'brand' => 'required'
        ];

        $messages = [ 
            'name.required'=> 'Name product is required.',
            'status.required'=> 'Status product is required.',
            'category.required'=> 'Category product is required.',
            'brand.required'=> 'Brand product is required.'
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
            
            if(!$this->product->checkUniqueName($request->name, null))
            {
                $array[] = ['key' => 'name', 'mess' => ["Name is not available."]];

                $checkValidation = false;
            }

            if(!$checkValidation){

                return $this->dataError('Errors', $array);
            }

            $data['name'] = $request->name;
            $data['category_id'] = $request->category;
            $data['brand_id'] = $request->brand;
            $data['status'] = $request->status;
            $data['description'] = $request->description;

            if($request->hasFile('image'))
            {   
                $imageFile = $request->file('image');

                $imageName = 'upload/' . time() . str_replace(" ","",$imageFile->getClientOriginalName());;

                $imageFile->move(public_path('upload/'), $imageName);

                $data['image'] = $imageName;
            }

            $saveProduct = $this->product->save($data);

            if($saveProduct){

                $dataSpecification['product_id'] = $saveProduct->id;

                $saveSpecification = $this->specification->save($dataSpecification);

                if($saveSpecification){

                    return $this->dataSuccess('Add Product Successfully.');

                }else{

                    return $this->dataSuccess('Add Product Successfully without specification.');
                }

               
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
    public function show($product_id)
    {
        $view['product'] = $this->product->showProduct($product_id);
        
        $view['listColor'] = $this->color->getListColor();
        // dd($view['product']);
        return view('admin.product-detail.list', $view);
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
        $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required',
            'category' => 'required',
            'brand' => 'required'

        ],[ 
            'name.required'=> 'Name product is required.',
            'status.required'=> 'Status product is required.',
            'category.required'=> 'Category product is required.',
            'brand.required'=> 'Brand product is required.',
        ]);

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
            
            if(!$this->product->checkUniqueName($request->name, $request->product_id))
            {
                $array[] = ['key' => 'name', 'mess' => ["Name is not available."]];

                $checkValidation = false;
            }
            
            if(!$checkValidation){

                return $this->dataError('Errors', $array);
            }

            $data['name'] = $request->name;
            $data['category_id'] = $request->category;
            $data['brand_id'] = $request->brand;
            $data['status'] = $request->status;
            $data['description'] = $request->description;

            if($request->hasFile('image'))
            {   
                $imageFile = $request->file('image');

                $imageName = 'upload/' . time() . str_replace(" ","",$imageFile->getClientOriginalName());

                $imageFile->move(public_path('upload/'), $imageName);

                $data['image'] = $imageName;
            }

            $saveProduct = $this->product->update($data, $request->product_id);

            if($saveProduct){

                return $this->dataSuccess('Edit Product Successfully');
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
    public function destroy($id)
    {
        //
    }

    public function destroyMulti(Request $request)
    {
        // $data["list_id"] = ['153328355727647','153328356657098'];

        $data["list_id"] = $request->arrid;

        $deleteMulti = $this->product->deleteMulti($data);

        $deleteComments = $this->comment->deleteComments($data["list_id"]);

        $deleteSpecfication = $this->specification->deleteSpecfication($data["list_id"]);

        if($deleteMulti == true && $deleteComments == true && $deleteSpecfication == true){

            return $this->dataSuccess('Delete Products Successfully');

        }else{

            return $this->dataError('Failed');
        }
    }
}
