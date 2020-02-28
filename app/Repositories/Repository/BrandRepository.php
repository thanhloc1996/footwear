<?php 
namespace App\Repositories\Repository; 
 
use App\Repositories\Interfaces\BrandRepositoryInterface; 
use App\Repositories\Interfaces\BaseRepositoryInterface; 
use App\Models\Brand; 
 
class BrandRepository implements BrandRepositoryInterface 
{ 
	private $Brand; 
	private $Base; 
	public function __construct(BaseRepositoryInterface $baseRepository) { 
        $this->Brand = new Brand();$this->base = $baseRepository;}
                 
 
	public function get($id,$columns = array('*'))
        {
                    $data = $this->Brand->find($id, $columns);
                        if ($data)
                        {
                            return $data;
                        }
                        return null;
        
        }  
	public function all($columns = array('*'))
        {
            $listData = $this->Brand->get($columns);
            return $listData;
        }  
	public function paginate($perPage = 15,$columns = array('*'))
        {
            $listData = $this->Brand->paginate($perPage, $columns);
            return $listData;
        }  
	public function save(array $data) 
        {
        return $this->Brand->create($data);
            
        }  
	public function update(array $data,$id) {
         $dep =  $this->Brand->find($id);
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
        
             $data = $this->Brand->where($column,$value)->first();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Brand;
           
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
        
             $data = $this->Brand->where($column,$value)->get();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getListByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Brand;
             
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
            $del = $this->Brand->find($id);
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
            $del = $this->Brand->whereIn("id",$data["list_id"])->delete();
            if ($del)
            {
              
                return true;
            }
            else{
                return false;
            }
        } 
    public function getListBrand()
    {
        $listSlider = $this->Brand->getBrandQuery()->get();

        return $listSlider;
    }
} 