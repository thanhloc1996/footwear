<?php 
namespace App\Repositories\Repository; 
 
use App\Repositories\Interfaces\CommentRepositoryInterface; 
use App\Repositories\Interfaces\BaseRepositoryInterface; 
use App\Models\Comment; 
use App\Models\Product; 
use App\Models\User; 
 
class CommentRepository implements CommentRepositoryInterface 
{ 
	private $Comment;
    private $Product; 
    private $User;
	private $Base; 
	public function __construct(BaseRepositoryInterface $baseRepository) { 
        $this->Comment = new Comment();
        $this->Product = new Product();
        $this->User = new User();
        $this->base = $baseRepository;
    }
                 
 
	public function get($id,$columns = array('*'))
        {
                    $data = $this->Comment->find($id, $columns);
                        if ($data)
                        {
                            return $data;
                        }
                        return null;
        
        }  
	public function all($columns = array('*'))
        {
            $listData = $this->Comment->get($columns);
            return $listData;
        }  
	public function paginate($perPage = 15,$columns = array('*'))
        {
            $listData = $this->Comment->paginate($perPage, $columns);
            return $listData;
        }  
	public function save(array $data) 
        {
        return $this->Comment->create($data);
            
        }  
	public function update(array $data,$id) {
         $dep =  $this->Comment->find($id);
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
        
             $data = $this->Comment->where($column,$value)->first();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Comment;
           
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
        
             $data = $this->Comment->where($column,$value)->get();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getListByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Comment;
             
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
            $del = $this->Comment->find($id);
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
            $del = $this->Comment->whereIn("id",$data["list_id"])->delete();
            if ($del)
            {
              
                return true;
            }
            else{
                return false;
            }
        } 
    
    public function getReviewHome()
    {   
        $listReview = $this->Comment->getCommentQuery()->whereIn('star', ['4','5'])->orderBy('created_at', 'desc')->take(8)->get();

        foreach($listReview as $review){

            $review->date = getDayFromDate($review->created_at);
        }

        return $listReview;
    }

    public function getCommentByUser($user_id){

        $listComment = $this->Comment->getCommentQuery()->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();

        foreach ($listComment as $comment) {
        
            $comment->date = getDayFromDate($comment->created_at);
        }

        return $listComment;
    }

    public function getCommentByProduct($product_id, $query, $url)
    {
        $listComment = $this->Comment->getCommentQuery()->where('product_id', $product_id)->orderBy('created_at', 'desc')->get();

        foreach ($listComment as $comment) {
        
            $comment->date = getDayFromDate($comment->created_at);
        }

        $per_page = empty($query['per_page']) ? 20 : $query['per_page'];

        $listComment = $this->base->paginateCollection($listComment, $query, $url, $per_page);
        
        return $listComment;  
    }

    public function deleteComments($array)
    {
        $deleteComments = $this->Comment->whereIn('product_id', $array)->delete();

        if($deleteComments){

            return true;
        }else{

            return false;
        }
    }
} 