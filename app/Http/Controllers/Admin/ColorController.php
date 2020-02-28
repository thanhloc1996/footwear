<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ColorRepositoryInterface;

class ColorController extends Controller
{   
    private $color;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(
        ColorRepositoryInterface $colorRepository
    )
    {
        $this->color = $colorRepository;
    }

    public function index()
    {
        $view['listColor'] = $this->color->getListColor();

        return view('admin.color.list', $view);
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
            'name.required'=> 'Tên là bắt buộc.'
        ];

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
            $data['code'] = $request->code;

            $saveColor = $this->color->save($data);

            if($saveColor){

                return $this->dataSuccess('Thêm màu sắc thành công!');
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
    public function edit()
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
            'name.required'=> 'Tên là bắt buộc.'
        ];

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
            $data['code'] = $request->code;

            $saveColor = $this->color->update($data, $request->color_id);

            if($saveColor){

                return $this->dataSuccess('Chỉnh sửa màu sắc thành công!');
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
        $countColor = $this->color->get($request->color_id)->product_detail_count;

        if($countColor > 0){

           return $this->dataError('Không thể xóa màu sắc này vì đã có sản phẩm tồn tại!'); 
        }

        $delete = $this->color->delete($request->color_id);

        if($delete){

            return $this->dataSuccess('Xóa danh mục sản phẩm thành công!');

        }else{

            return $this->dataError('Thất bại!');
        }
    }
}
