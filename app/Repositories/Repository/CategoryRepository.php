<?php 
namespace App\Repositories\Repository; 
 
use App\Repositories\Interfaces\CategoryRepositoryInterface; 
use App\Repositories\Interfaces\BaseRepositoryInterface; 
use App\Models\Category; 
 
class CategoryRepository implements CategoryRepositoryInterface 
{ 
	private $Category; 
	private $Base; 
	public function __construct(BaseRepositoryInterface $baseRepository) { $this->Category = new Category();$this->base = $baseRepository;}
                 
 
	public function get($id,$columns = array('*'))
        {
                    $data = $this->Category->find($id, $columns);
                        if ($data)
                        {
                            return $data;
                        }
                        return null;
        
        }  
	public function all($columns = array('*'))
        {
            $listData = $this->Category->get($columns);
            return $listData;
        }  
	public function paginate($perPage = 15,$columns = array('*'))
        {
            $listData = $this->Category->paginate($perPage, $columns);
            return $listData;
        }  
	public function save(array $data) 
        {
        return $this->Category->create($data);
            
        }  
	public function update(array $data,$id) {
         $dep =  $this->Category->find($id);
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
        
             $data = $this->Category->where($column,$value)->first();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Category;
           
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
        
             $data = $this->Category->where($column,$value)->get();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getListByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Category;
             
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
            $del = $this->Category->find($id);
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
            $del = $this->Category->whereIn("id",$data["list_id"])->delete();
            if ($del)
            {
              
                return true;
            }
            else{
                return false;
            }
        } 

    public function getListCategoryParent()
    {
        $listCategoryParent = $this->Category->getCategoryQuery()->where('parent_id', null)->get();

        return $listCategoryParent;
    }

    public function getListCategory()
    {
        $listCategoryParent = $this->Category->getCategoryQuery()->get();

        return $listCategoryParent;
    }

    public function getListCategoryNotParent()
    {
        $listCategoryParent = $this->Category->getCategoryQuery()->whereNotNull('parent_id')->get();

        $listCategoryParent = $listCategoryParent->sortBy('categoryParent.name');

        return $listCategoryParent;
    }

    public function getCategoryById($category_id)
    {
        $category = $this->Category->find($category_id);

        return $category;
    }
} 