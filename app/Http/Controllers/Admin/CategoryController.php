<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{   
    private $category;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->category = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $view['listCategory'] = $this->category->getListCategoryNotParent();

        $view['listCategoryParent'] = $this->category->getListCategoryParent();
        // dd($view['listCategory']);
        return view('admin.category.list', $view);
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
        ];

        $messages = [ 
            'name.required'=> 'Tên danh mục là bắt buộc.',
        ];

        if($request->checkparent != 1){

            $rules['parent'] = 'required';
            $messages['parent.required'] = 'Danh mục cấp 1 là bắt buộc.';

            $data['parent_id'] = $request->parent;
        }

        $validator = \Validator::make($request->all(), $rules, $messages);

        $array = [];

        if ($validator->fails()) {

            $data_errors = $validator->errors();

            foreach ($data_errors->messages() as $key => $error){

                $array[] = ['key' => $key, 'mess' => $error];
            }

            return $this->dataError('Errors', $array);

        }else{

            $data['name'] = $request->name;
            
            $saveCategory = $this->category->save($data);

            if($saveCategory){

                return $this->dataSuccess('Thêm danh mục sản phẩm thành công!');
            }
        }
        return $this->dataError('Thất bại!', $array);
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
            'name.required'=> 'Tên danh mục là bắt buộc.'
        ];

        if($this->category->get($request->category_id)->parent_id){

            $rules['parent'] = 'required';
            $messages['parent.required'] = 'Danh mục cấp 1 là bắt buộc.';
            $data['parent_id'] = $request->parent;
        }

        $validator = \Validator::make($request->all(), $rules, $messages);

        $array = [];

        if ($validator->fails()) {

            $data_errors = $validator->errors();

            foreach ($data_errors->messages() as $key => $error){

                $array[] = ['key' => $key, 'mess' => $error];
            }

            return $this->dataError('Thất bại!', $array);

        }else{

            $data['name'] = $request->name;

            $saveCategory = $this->category->update($data, $request->category_id);

            if($saveCategory){

                return $this->dataSuccess('Chỉnh sửa danh mục sản phẩm thành công!');
            }
        }
        return $this->dataError('Thất bại!', $array);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $delete = $this->category->delete($request->category_id);

        if($delete){

            return $this->dataSuccess('Xóa danh mục sản phẩm thành công!');

        }else{

            return $this->dataError('Thất bại!');
        }
    }
}
