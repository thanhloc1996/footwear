<?php 
namespace App\Repositories\Repository; 
 
use App\Repositories\Interfaces\FeedbackRepositoryInterface; 
use App\Repositories\Interfaces\BaseRepositoryInterface; 
use App\Models\Feedback; 
 
class FeedbackRepository implements FeedbackRepositoryInterface 
{ 
	private $Feedback; 
	private $base; 
	public function __construct(BaseRepositoryInterface $baseRepository) { 
        $this->Feedback = new Feedback();
        $this->base = $baseRepository;
    }
                 
 
	public function get($id,$columns = array('*'))
        {
                    $data = $this->Feedback->find($id, $columns);
                        if ($data)
                        {
                            return $data;
                        }
                        return null;
        
        }  
	public function all($columns = array('*'))
        {
            $listData = $this->Feedback->get($columns);
            return $listData;
        }  
	public function paginate($perPage = 15,$columns = array('*'))
        {
            $listData = $this->Feedback->paginate($perPage, $columns);
            return $listData;
        }  
	public function save(array $data) 
        {
        return $this->Feedback->create($data);
            
        }  
	public function update(array $data,$id) {
         $dep =  $this->Feedback->find($id);
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
        
             $data = $this->Feedback->where($column,$value)->first();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Feedback;
           
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
        
             $data = $this->Feedback->where($column,$value)->get();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getListByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Feedback;
             
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
            $del = $this->Feedback->find($id);
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
            $del = $this->Feedback->whereIn("id",$data["list_id"])->delete();
            if ($del)
            {
              
                return true;
            }
            else{
                return false;
            }
        } 
    
    public function getListFeedback($query, $url)
    {
        $listFeedback = $this->Feedback->getFeedbackQuery()->get();

        foreach ($listFeedback as $feedback) {
        
            $feedback->date = getDayFromDate($feedback->created_at);
        }

        $per_page = empty($query['per_page']) ? 20 : $query['per_page'];

        $listFeedback = $this->base->paginateCollection($listFeedback, $query, $url, $per_page);

        return $listFeedback;
    }
} 