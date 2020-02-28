<?php 
namespace App\Repositories\Repository; 
 
use App\Repositories\Interfaces\ProductDetailRepositoryInterface; 
use App\Repositories\Interfaces\BaseRepositoryInterface; 
use App\Models\ProductDetail; 
 
class ProductDetailRepository implements ProductDetailRepositoryInterface 
{ 
	private $ProductDetail; 
	private $Base; 
	public function __construct(BaseRepositoryInterface $baseRepository) { $this->ProductDetail = new ProductDetail();$this->base = $baseRepository;}
                 
 
	public function get($id,$columns = array('*'))
        {
                    $data = $this->ProductDetail->getProductDetailQuery()->find($id, $columns);
                        if ($data)
                        {
                            return $data;
                        }
                        return null;
        
        }  
	public function all($columns = array('*'))
        {
            $listData = $this->ProductDetail->get($columns);
            return $listData;
        }  
	public function paginate($perPage = 15,$columns = array('*'))
        {
            $listData = $this->ProductDetail->paginate($perPage, $columns);
            return $listData;
        }  
	public function save(array $data) 
        {
        return $this->ProductDetail->create($data);
            
        }  
	public function update(array $data,$id) {
         $dep =  $this->ProductDetail->find($id);
        if ($dep)
        {
            foreach ($dep->getFillable() as $field)
            {
                if (array_key_exists($field,$data)){
                    $dep->$field = $data[$field];
                }
            }
            if ($dep->save())
            {
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
        }  
	public function getByColumn($column,$value,$columnsSelected = array('*')) 
        {
        
             $data = $this->ProductDetail->where($column,$value)->first();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->ProductDetail;
           
            foreach ($where as $key => $value) {
                $data = $data->where($key, $value);
            }
    
            $data = $data->first();
             
           
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getListByColumn($column,$value,$columnsSelected = array('*')) 
        {
        
             $data = $this->ProductDetail->where($column,$value)->get();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getListByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->ProductDetail;
             
              foreach ($where as $key => $value) {
            $data = $data->where($key, $value);
        }

        $data = $data->get();
        
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function delete($id)
        {
            $del = $this->ProductDetail->find($id);
            if ($del !== null)
            {
                $del->delete();
                return true;
            }
            else{
                return false;
            }
        } 
         
	public function deleteMulti(array $data)
        {
            $del = $this->ProductDetail->whereIn("id",$data["list_id"])->delete();
            if ($del)
            {
              
                return true;
            }
            else{
                return false;
            }
        } 
    
    public function checkUniqueProductDetail($product_id, $name, $product_detail_id)
    {
        $checkUnique = $this->ProductDetail->where('product_id', $product_id)->where('name', 'LIKE', $name)->where('id', '!=', $product_detail_id)->first();

        if($checkUnique){

            return false;
        }else{

            return true;
        }
    }

    public function getSizeByColor($product_id, $color_id)
    {   
        // dd($product_id);
        $listSize = $this->ProductDetail->where('product_id', $product_id)->where('color_id', $color_id)->orderBy('size', 'asc')->select('size')->get()->pluck('size');

        return $listSize;
    }

    public function checkProductExist($product_detail_id)
    {
        $checkProductExist = $this->ProductDetail->find($product_detail_id);

        if($checkProductExist){

            return true;
        }else{

            return false;
        }
    }

    public function getProductDetailAjax($color_id, $size)
    {
        $productDetail = $this->ProductDetail->where('color_id', $color_id)->where('size', $size)->first();

        return $productDetail;
    }

    public function checkProductDetail($product_id, $color_id, $size, $product_detail_id)
    {
        $checkProductDetail = $this->ProductDetail->where('product_id', $product_id)->where('color_id', $color_id)->where('size', $size)->where('id', '!=', $product_detail_id)->first();

        if($checkProductDetail){

            return true;
        }else{  

            return false;
        }
    }
} 