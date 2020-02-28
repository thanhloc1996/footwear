<?php 
namespace App\Repositories\Repository; 
 
use App\Repositories\Interfaces\SpecificationRepositoryInterface; 
use App\Repositories\Interfaces\BaseRepositoryInterface; 
use App\Models\Specification; 
 
class SpecificationRepository implements SpecificationRepositoryInterface 
{ 
	private $Specification; 
	private $Base; 
	public function __construct(BaseRepositoryInterface $baseRepository) { $this->Specification = new Specification();$this->base = $baseRepository;}
                 
 
	public function get($id,$columns = array('*'))
        {
                    $data = $this->Specification->find($id, $columns);
                        if ($data)
                        {
                            return $data;
                        }
                        return null;
        
        }  
	public function all($columns = array('*'))
        {
            $listData = $this->Specification->get($columns);
            return $listData;
        }  
	public function paginate($perPage = 15,$columns = array('*'))
        {
            $listData = $this->Specification->paginate($perPage, $columns);
            return $listData;
        }  
	public function save(array $data) 
        {
        return $this->Specification->create($data);
            
        }  
	public function update(array $data,$id) {
         $dep =  $this->Specification->find($id);
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
        
             $data = $this->Specification->where($column,$value)->first();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Specification;
           
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
        
             $data = $this->Specification->where($column,$value)->get();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getListByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Specification;
             
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
            $del = $this->Specification->find($id);
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
            $del = $this->Specification->whereIn("id",$data["list_id"])->delete();
            if ($del)
            {
              
                return true;
            }
            else{
                return false;
            }
        } 
    
    public function getValueByColumn($field, $prefix, $header, $key)
    {   
        $data = $this->Specification->select($field)->orderBy($field, 'asc')->get()->toArray();

        $data = array_pluck($data, $field);

        $data = array_map('trim', $data);

        $data = array_unique($data);

        $data = array_values($data);

        if($key == 'material'){
            for($i=0 ; $i < count($data); $i++){
                switch ($data[$i]) {
                    case '1':
                    $data[$i] = 'Leather';
                    break;
                    case '2':
                    $data[$i] = 'Canvas';
                    break;
                    default:
                    $data[$i] = 'Other';
                    break;
                }
            }
        }elseif($key == 'gender'){
            for($i=0 ; $i < count($data); $i++){
                switch ($data[$i]) {
                    case '1':
                    $data[$i] = 'Male';
                    break;
                    case '2':
                    $data[$i] = 'Female';
                    break;
                    default:
                    $data[$i] = 'Unisex';
                    break;
                }
            }
        }elseif($key == 'trendy'){
            for($i=0 ; $i < count($data); $i++){
                switch ($data[$i]) {
                    case '1':
                    $data[$i] = 'Street ';
                    break;
                    case '2':
                    $data[$i] = 'Vintage ';
                    break;
                    case '3':
                    $data[$i] = 'High-end  ';
                    break;
                    default:
                    $data[$i] = 'Other';
                    break;
                }
            }
        }
        else{
            $data = array_map(function($value) use ($prefix) { return $value. ' ' .$prefix; }, $data);  
        }

        $arr = ['header'=> $header, 'input' => strtolower(str_replace(' ', '_', $header)), 'data'=> $data];

        return $arr;
    }

    public function sidebarFilter()
    {
        $sidebarFilter = $this->Specification->getFillable();

        foreach($sidebarFilter as $item)
        {   
            switch ($item) {
                case 'material':
                    $arr[] = $this->getValueByColumn('material', '', 'Material', 'material');
                    break;
                case 'gender':
                    $arr[] = $this->getValueByColumn('gender', '', 'Gender', 'gender');
                    break;
                case 'trendy':
                    $arr[] = $this->getValueByColumn('trendy', '', 'Trendy', 'trendy');
                    break;
                case 'weight':
                    $arr[] = $this->getValueByColumn('weight', 'Kg', 'Weight', 'weight');
                    break;
                default:
                    break;
            }
        }
        return $arr;
    }  

    public function deleteSpecfication($array)
    {
        $deleteSpecfication = $this->Specification->whereIn('product_id', $array)->delete();

        if($deleteSpecfication){

            return true;
        }else{

            return false;
        }
    }
} 