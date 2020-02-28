<?php 
namespace App\Repositories\Repository; 
 
use App\Repositories\Interfaces\GalleryRepositoryInterface; 
use App\Repositories\Interfaces\BaseRepositoryInterface; 
use App\Models\Gallery; 
 
class GalleryRepository implements GalleryRepositoryInterface 
{ 
	private $Gallery; 
	private $Base; 
	public function __construct(BaseRepositoryInterface $baseRepository) { $this->Gallery = new Gallery();$this->base = $baseRepository;}
                 
 
	public function get($id,$columns = array('*'))
        {
                    $data = $this->Gallery->find($id, $columns);
                        if ($data)
                        {
                            return $data;
                        }
                        return null;
        
        }  
	public function all($columns = array('*'))
        {
            $listData = $this->Gallery->get($columns);
            return $listData;
        }  
	public function paginate($perPage = 15,$columns = array('*'))
        {
            $listData = $this->Gallery->paginate($perPage, $columns);
            return $listData;
        }  
	public function save(array $data) 
        {
        return $this->Gallery->create($data);
            
        }  
	public function update(array $data,$id) {
         $dep =  $this->Gallery->find($id);
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
        
             $data = $this->Gallery->where($column,$value)->first();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Gallery;
           
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
        
             $data = $this->Gallery->where($column,$value)->get();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getListByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Gallery;
             
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
            $del = $this->Gallery->find($id);
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
            $del = $this->Gallery->whereIn("id",$data["list_id"])->delete();
            if ($del)
            {
              
                return true;
            }
            else{
                return false;
            }
        } 
    
    public function getGallery($product_id)
    {
        $listGallery = $this->Gallery->where('product_id', $product_id)->orderBy('created_at', 'desc')->get();

        return $listGallery;
    }
} 