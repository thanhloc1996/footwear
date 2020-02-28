<?php 
namespace App\Repositories\Repository; 
 
use App\Repositories\Interfaces\BillRepositoryInterface; 
use App\Repositories\Interfaces\BaseRepositoryInterface; 
use App\Models\Bill; 
 
class BillRepository implements BillRepositoryInterface 
{ 
	private $Bill; 
	private $Base; 
	public function __construct(BaseRepositoryInterface $baseRepository) { $this->Bill = new Bill();$this->base = $baseRepository;}
                 
 
	public function get($id,$columns = array('*'))
        {
                    $data = $this->Bill->find($id, $columns);
                        if ($data)
                        {
                            return $data;
                        }
                        return null;
        
        }  
	public function all($columns = array('*'))
        {
            $listData = $this->Bill->get($columns);
            return $listData;
        }  
	public function paginate($perPage = 15,$columns = array('*'))
        {
            $listData = $this->Bill->paginate($perPage, $columns);
            return $listData;
        }  
	public function save(array $data) 
        {
        return $this->Bill->create($data);
            
        }  
	public function update(array $data,$id) {
         $dep =  $this->Bill->find($id);
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
        
             $data = $this->Bill->where($column,$value)->first();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Bill;
           
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
        
             $data = $this->Bill->where($column,$value)->get();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getListByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Bill;
             
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
            $del = $this->Bill->find($id);
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
            $del = $this->Bill->whereIn("id",$data["list_id"])->delete();
            if ($del)
            {
              
                return true;
            }
            else{
                return false;
            }
        } 
    
    public function getListBill($query, $url)
    {
        $listBill = $this->Bill->getBillQuery()->orderBy('created_at', 'desc')->get();

        $per_page = empty($query['per_page']) ? 20 : $query['per_page'];

        $listBill = $this->base->paginateCollection($listBill, $query, $url, $per_page);

        return $listBill;
    }

    public function getDetailBill($bill_id)
    {
        $bill = $this->Bill->getBillQuery()->find($bill_id);

        return $bill;
    }

    public function updateStockProduct($bill_id)
    {
        $bill = $this->Bill->getBillQuery()->find($bill_id);

        $array = [];
        $checkTemp = true;

        foreach($bill->billDetail as $item)
        {
            $tempQuantity = $item->productDetail->quantity - $item->quantity;

            if($tempQuantity < 0){

                $array[] = ['id'=>$item->productDetail->id, 'name'=>$item->productDetail->product->name .' - ' . $item->productDetail->name, 'error'=> 'Enough quantity!'];

                $checkTemp = false;
            }
        }

        if($checkTemp){

            foreach($bill->billDetail as $item)
            {
                $item->productDetail->quantity = $item->productDetail->quantity - $item->quantity;

                $item->productDetail->save();
            }

            return ['type' => true, 'data' => []];
            
        }else{

            return ['type' => false, 'data' => $array];
        }
    }

    public function getBillByUser($user_id, $url)
    {
        $listBill = $this->Bill->getBillQuery()->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();

        foreach($listBill as $item){
            switch ($item->status) {
                case '1':
                    $item->status = "Processing";
                    break; 
                case '2':
                    $item->status = "Completed";
                    break;
                case '4':
                    $item->status = "Checkout";
                    break;  
                default:
                    $item->status = "Cancel";
                    break;
            }
        }

        $per_page = empty($query['per_page']) ? 20 : $query['per_page'];

        $listBill = $this->base->paginateCollection($listBill, null, $url, $per_page);

        return $listBill;
    }
} 