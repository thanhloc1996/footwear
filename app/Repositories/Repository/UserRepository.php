<?php 
namespace App\Repositories\Repository; 
 
use App\Repositories\Interfaces\UserRepositoryInterface; 
use App\Repositories\Interfaces\BaseRepositoryInterface; 
use App\Models\User;
use App\Models\Comment;
use App\Models\Feedback;    
 
class UserRepository implements UserRepositoryInterface 
{ 
	private $User;
    private $Comment;
    private $Feedback;   
	private $Base; 
	public function __construct(BaseRepositoryInterface $baseRepository) { 
        $this->User = new User();
        $this->Comment = new Comment();
        $this->Feedback = new Feedback();
        $this->base = $baseRepository;
    }

	public function get($id,$columns = array('*'))
        {
                    $data = $this->User->find($id, $columns);
                        if ($data)
                        {
                            return $data;
                        }
                        return null;
        
        }  
	public function all($columns = array('*'))
        {
            $listData = $this->User->get($columns);
            return $listData;
        }  
	public function paginate($perPage = 15,$columns = array('*'))
        {
            $listData = $this->User->paginate($perPage, $columns);
            return $listData;
        }  
	public function save(array $data) 
        {
        return $this->User->create($data);
            
        }  
	public function update(array $data,$id) {
         $dep =  $this->User->find($id);
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
        
             $data = $this->User->where($column,$value)->first();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->User;
           
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
        
             $data = $this->User->where($column,$value)->get();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getListByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->User;
             
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
            $del = $this->User->find($id);
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
            $del = $this->User->whereIn("id",$data["list_id"])->delete();
            if ($del)
            {
              
                return true;
            }
            else{
                return false;
            }
        } 

    public function checkUserAvailable($value)
    {
        $checkUserAvailable = $this->User->where('email', $value)->orWhere('username', $value)->first();

        if($checkUserAvailable){

            return true;

        }else{

            return false;
        }
    }

    public function checkUserCommentAvailable($user_id, $product_id)
    {
        $checkUserCommentAvailable = $this->Comment->where('user_id', $user_id)->where('product_id', $product_id)->first();

        if($checkUserCommentAvailable){

            return true;

        }else{
            
            return false;
        }
    }

    public function checkUserFeedbackAvailable($user_id)
    {
        $checkUserFeedbackAvailable = $this->Feedback->where('user_id', $user_id)->first();

        if($checkUserFeedbackAvailable){

            return true;

        }else{
            
            return false;
        }
    }

    public function listUser($query, $url)
    {   
        $listUser = $this->User->getUserQuery()->where('group_id', 2);

        if(!empty($query['name'])){

            $listUser = $listUser->where(function($listUser) use ($query)
            {
                $listUser->where('first_name', 'LIKE', '%'.$query['name'].'%');
                $listUser->orWhere('last_name', 'LIKE', '%'.$query['name'].'%');  
            });         
            // $listUser = $listUser->orWhere('first_name', 'LIKE', '%'.$query['name'].'%');
            // $listUser = $listUser->orWhere('last_name', 'LIKE', '%'.$query['name'].'%');  
        }

        if(!empty($query['username'])){

            $listUser = $listUser->where('username', 'LIKE', '%'.$query['username'].'%');         
        }

        if(!empty($query['email'])){

            $listUser = $listUser->where('email', 'LIKE', '%'.$query['email'].'%');         
        }

        if(!empty($query['address'])){

            $listUser = $listUser->where('address', 'LIKE', '%'.$query['address'].'%');         
        }

        if(!empty($query['phone'])){

            $listUser = $listUser->where('phone', 'LIKE', '%'.$query['phone'].'%');         
        }

        $listUser = $listUser->get();

        foreach($listUser as $user){

            if($user->gender == 1){

                $user->gender = ["text" => "Male", "number" => "1"];
            }else{

                $user->gender = ["text" => "Female", "number" => "2"];
            }
        }

        if(!empty($query['sort'])){
            switch ($query['sort']) {
                case '2':
                    $listUser = $listUser->sortBy('username');
                    break;
                case '3':
                    $listUser = $listUser->sortByDesc('username');
                    break;
                case '4':
                    $listUser = $listUser->sortBy('first_name');
                    break;
                case '5':
                    $listUser = $listUser->sortByDesc('first_name');
                    break;
                default:
                    break;
            }

        }else{

            $listUser = $listUser->sortByDesc('created_at');
        }

        $per_page = empty($query['per_page']) ? 20 : $query['per_page'];

        $listUser = $this->base->paginateCollection($listUser, $query, $url, $per_page);

        return $listUser;
    }

    public function checkUniqueUser($username, $email, $user_id)
    {
        $checkUniqueUsername = $this->User->where('username', 'LIKE', $username)->where('id', '!=', $user_id)->first();
        
        $checkUniqueEmail = $this->User->where('email', 'LIKE', $email)->where('id', '!=', $user_id)->first();

        $checkUser = true;
        $array = [];

        if($checkUniqueUsername)
        {
            $checkUser = false;
            $array[] = ['key' => 'username', 'mess' => ["Username is not available."]];
        }

        if($checkUniqueEmail)
        {
            $checkUser = false;
            $array[] = ['key' => 'email', 'mess' => ["Email is not available."]];
        }

        return [
            'check' => $checkUser,
            'error' => $array
        ];
    }

    public function checkUserSocial($provider, $provider_id)
    {
        $checkUser = $this->User->where('provider', $provider)->where('provider_id', $provider_id)->first();

        if($checkUser){

            return $checkUser;
        }
        return false;
    }

    public function listLatestUser()
    {
        $listLatestUser = $this->User->take(8)->get();

        foreach($listLatestUser as $item)
        {   
            $item->date = getDayFromDate($item->created_at);
        }

        return $listLatestUser;
    }
} 