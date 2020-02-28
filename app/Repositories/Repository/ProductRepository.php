<?php 
namespace App\Repositories\Repository; 
 
use App\Repositories\Interfaces\ProductRepositoryInterface; 
use App\Repositories\Interfaces\BaseRepositoryInterface; 
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Gallery;
use App\Models\Bill;
use Carbon\Carbon;
 
class ProductRepository implements ProductRepositoryInterface 
{ 
	private $Product;
    private $ProductDetail;
    private $Gallery;  
    private $Bill;  
	private $base; 
	public function __construct(BaseRepositoryInterface $baseRepository) { 
        $this->Product = new Product();
        $this->Bill = new Bill();
        $this->ProductDetail = new ProductDetail();
        $this->Gallery = new Gallery();
        $this->base = $baseRepository;
    }
                 
 
	public function get($id,$columns = array('*'))
        {
                    $data = $this->Product->find($id, $columns);
                        if ($data)
                        {
                            return $data;
                        }
                        return null;
        
        }  
	public function all($columns = array('*'))
        {
            $listData = $this->Product->get($columns);
            return $listData;
        }  
	public function paginate($perPage = 15,$columns = array('*'))
        {
            $listData = $this->Product->paginate($perPage, $columns);
            return $listData;
        }  
	public function save(array $data) 
        {
        return $this->Product->create($data);
            
        }  
	public function update(array $data,$id) {
         $dep =  $this->Product->find($id);
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
        
             $data = $this->Product->where($column,$value)->first();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Product;
           
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
        
             $data = $this->Product->where($column,$value)->get();
            if ($data)
            {
                return $data;
            }
            return null;
        
        
        }  
	public function getListByMultiColumn(array $where,$columnsSelected = array('*')) 
        {
        
             $data = $this->Product;
             
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
            $del = $this->Product->find($id);
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
            $del = $this->Product->whereIn("id",$data["list_id"])->delete();
            if ($del)
            {
              
                return true;
            }
            else{
                return false;
            }
        }

    public function listProduct($query, $url, $paginateQuery)
    {   
        $listProduct = $this->Product->getProductQuery();

        if(!empty($query['name'])){

            $listProduct = $listProduct->where('name', 'LIKE', '%'.$query['name'].'%');         
        }

        if(!empty($query['brand'])){

            $listProduct = $listProduct->whereIn('brand_id', $query['brand']);         
        }

        if(!empty($query['category'])){

            $listProduct = $listProduct->where('category_id', $query['category']);         
        }

        if(!empty($query['categories'])){

            $listProduct = $listProduct->whereIn('category_id', $query['categories']);         
        }

        if(!empty($query['color'])){

            $listProduct = $listProduct->whereHas('productDetail', function($listProduct) use ($query){
                        
                $listProduct->whereIn('color_id', $query['color']);
            });
        }

        if(!empty($query['material'])){

            $listProduct = $listProduct->whereHas('specification', function($listProduct) use ($query){
                
                $listProduct->whereIn('material', $query['material']);
            });
        }

        if(!empty($query['gender'])){

            $listProduct = $listProduct->whereHas('specification', function($listProduct) use ($query){
                
                $listProduct->whereIn('gender', $query['gender']);
            });
        }

        if(!empty($query['trendy'])){

            $listProduct = $listProduct->whereHas('specification', function($listProduct) use ($query){
                
                $listProduct->whereIn('trendy', $query['trendy']);
            });
        }

        if(!empty($query['weight'])){

            $listProduct = $listProduct->whereHas('specification', function($listProduct) use ($query){
                
                $listProduct->whereIn('weight', $query['weight']);
            });
        }

        if(isset($query['min_price'])){

            if($query['min_price'] == 0.00){

                $query['min_price'] = null;
            }
        }
        
        if(!empty($query['min_price']) && !empty($query['max_price'])){

            $listProduct = $listProduct->whereHas('productDetail', function($listProduct) use ($query){

                $listProduct->whereBetween('price', [$query['min_price'], $query['max_price']]);
            });
        }
        
        $listProduct = $listProduct->get();

        foreach($listProduct as $product)
        {   
            //Total quantity
            $product->stockquantity = $product->productDetail->sum('quantity');

            //Price Product
            if($product->productDetail->min('price') == $product->productDetail->max('price')){

                if(count($product->productDetail) == 0){

                    $product->price = '0';
                }else{

                   $product->price = $product->productDetail->min('price'); 
                }
            }else{

               $product->price =  $product->productDetail->min('price'). '-' . $product->productDetail->max('price');
            }

            //Status Product
            switch ($product->status) {
                case '1':
                $product->status = ['number'=> 1, 'text'=> '', 'code'=> '#e5800e00'];
                $product->statusAdmin = ['number'=> 1, 'text'=> 'Now', 'code'=> 'btn-xs btn-success'];
                break;
                case '2':
                $product->status = ['number'=> 2, 'text'=> 'Soon', 'code'=> '#e5800e'];
                $product->statusAdmin = ['number'=> 2, 'text'=> 'Soon', 'code'=> 'btn-xs btn-warning'];
                break;
                case '3':
                $product->status = ['number'=> 3, 'text'=> 'End', 'code'=> '#e50e0e'];
                $product->statusAdmin = ['number'=> 3, 'text'=> 'End', 'code'=> 'btn-xs btn-danger'];
                break;
                default:
                $product->status = ['number'=> 4, 'text'=> 'Undefine', 'code'=> '#0ee511'];
                $product->statusAdmin = ['number'=> 4, 'text'=> 'Undefine', 'code'=> 'btn-xs btn-primary'];
                break;
            }

            //Product Day Ago
            $product->date = getDayFromDate($product->created_at);

            //Product Star
            $product->star = $product->comment->avg('star');

            //Specification Product 
            if(!empty($product->specification)){

                $specification = $product->specification->toArray();

                unset($specification['id']);
                unset($specification['product_id']);
                unset($specification['deleted_at']);
                unset($specification['created_at']);
                unset($specification['updated_at']);

                foreach($specification as $key => $value){
                    switch ($key) {
                        case 'material':
                        switch ($value) {
                            case '1':
                            $value = 'Leather';
                            break;
                            case '2':
                            $value = 'Canvas';
                            break;
                            default:
                            $value = 'Other';
                            break;
                        }
                        break;
                        case 'gender':
                        switch ($value) {
                            case '1':
                            $value = 'Male';
                            break;
                            case '2':
                            $value = 'Female';
                            break;
                            default:
                            $value = 'Unisex';
                            break;
                        }  
                        break;
                        case 'trendy':
                        switch ($value) {
                            case '1':
                            $value = 'Street';
                            break;
                            case '2':
                            $value = 'Vintage';
                            break;
                            case '3':
                            $value = 'High-end';
                            break;
                            default:
                            $value = 'Unisex';
                            break;
                        }  
                        break;
                        case 'weight':
                        $value =  $value . ' Kg';
                        break;
                        default:
                        break;
                    }
                    $specification[$key] = $value;
                }

                $product->listSpecification = $specification; 

            }else{

                $product->listSpecification = [];
            }
        }

        if(!empty($query['status'])){
                
            $listProduct = $listProduct->whereIn('status.number', $query['status']);
        }

        if(!empty($query['sort'])){
            switch ($query['sort']) {
                case '1':
                    $listProduct = $listProduct->sortBy('status');
                    break;
                case '2':
                    $listProduct = $listProduct->sortBy('name');
                    break;
                case '3':
                    $listProduct = $listProduct->sortByDesc('name');
                    break;
                case '4':
                    $listProduct = $listProduct->sortBy('price');
                    break;
                case '5':
                    $listProduct = $listProduct->sortByDesc('price');
                    break;
                default:
                    break;
            }

        }else{

            $listProduct = $listProduct->sortByDesc('created_at');
        }
        
        $per_page = empty($query['per_page']) ? 20 : $query['per_page'];

        $listProduct = $this->base->paginateCollection($listProduct, $paginateQuery, $url, $per_page);

        return $listProduct;
    }

    public function showProduct($product_id)
    {
        $product = $this->Product->getProductQuery()->find($product_id);

        //Price Product
        if($product->productDetail->min('price') == $product->productDetail->max('price')){

            if(count($product->productDetail) == 0){

                $product->price = '0';
            }else{

               $product->price = $product->productDetail->min('price'); 
            }
        }else{

           $product->price =  $product->productDetail->min('price'). '-' . $product->productDetail->max('price');
        }
            
        //Product Star
        $product->star = $product->comment->avg('star');

        //Product Day Ago
        $product->date = getDayFromDate($product->created_at);

        //Status Product
        switch ($product->status) {
            case '1':
            $product->status = ['number'=> 1, 'text'=> '', 'code'=> '#e5800e00'];
            break;
            case '2':
            $product->status = ['number'=> 2, 'text'=> 'Soon', 'code'=> '#e5800e'];
            break;
            case '3':
            $product->status = ['number'=> 3, 'text'=> 'End', 'code'=> '#e50e0e'];
            break;
            default:
            $product->status = ['number'=> 4, 'text'=> 'Undefine', 'code'=> '#0ee511'];
            break;
        }
        
        //Specification Product 
        if(!empty($product->specification)){

            $specification = $product->specification->toArray();

            unset($specification['id']);
            unset($specification['product_id']);
            unset($specification['deleted_at']);
            unset($specification['created_at']);
            unset($specification['updated_at']);

            foreach($specification as $key => $value){
                switch ($key) {
                    case 'material':
                        switch ($value) {
                            case '1':
                                $value = 'Leather';
                                break;
                            case '2':
                                $value = 'Canvas';
                                break;
                            default:
                                $value = 'Other';
                                break;
                        }
                        break;
                    case 'gender':
                        switch ($value) {
                            case '1':
                                $value = 'Male';
                                break;
                            case '2':
                                $value = 'Female';
                                break;
                            default:
                                $value = 'Unisex';
                                break;
                        }  
                        break;
                    case 'trendy':
                        switch ($value) {
                            case '1':
                                $value = 'Street';
                                break;
                            case '2':
                                $value = 'Vintage';
                                break;
                            case '3':
                                $value = 'High-end';
                                break;
                            default:
                                $value = 'Unisex';
                                break;
                        }  
                        break;
                    case 'weight':
                        $value =  $value . ' Kg';
                        break;
                    default:
                        break;
                }
                $specification[$key] = $value;
            }

            $product->listSpecification = $specification; 

        }else{

            $product->listSpecification = [];
        }     

        // dd($product);
        return $product;
    }

    public function getNewProductHome()
    {
        $listProduct = $this->Product->getProductQuery()->orderBy('created_at', 'desc');

        $listProduct = $listProduct->take(5)->get() ;

        foreach($listProduct as $product)
        {   
            //Price Product
            if($product->productDetail->min('price') == $product->productDetail->max('price')){

                if(count($product->productDetail) == 0){

                    $product->price = '0';
                }else{

                   $product->price = $product->productDetail->min('price'); 
                }
            }else{

               $product->price =  $product->productDetail->min('price'). '-' . $product->productDetail->max('price');
            }

            //Product Day Ago
            $product->date = getDayFromDate($product->created_at);
        }

        return $listProduct;
    }

    public function getProductByProductDetail($product_detail_id)
    {   
        $productDetail = $this->ProductDetail->find($product_detail_id);

        $product = $this->Product->find($productDetail->product_id);

        if($product){

            return $product;
        }else{

            return null;
        }
        
    }

    public function getNameAllProduct()
    {
        $listNameProduct = array_column($this->Product->select('name')->get()->toArray(), 'name');

        return $listNameProduct;
    }

    public function checkUniqueName($product_name, $product_id)
    {
        $checkUniqueName = $this->Product->where('name', 'LIKE', $product_name)->where('id', '!=', $product_id)->first();
  
        if($checkUniqueName)
        {
            return false;
        }
        return true;
    }

    public function listTopProduct($limit)
    {
        $listBill = $this->Bill->getBillQuery()->where('status', 2)->get();

        $array = []; $lastArray = []; $tempArray = [];

        $i = 0; $j =0;

        foreach($listBill as $bill)
        {
            foreach($bill->billDetail as $key => $item)
            {  
                $array[$i]['product_id'] = $item->productDetail->product->id;
                $array[$i]['quantity'] = $item->quantity;
                $i++;
            }
        }

        $array = collect($array)->sortBy('product_id');

        foreach($array as $key => $item)
        {
            $tempArray[$item['product_id']][$key] = $item;
        }

        foreach($tempArray as $item)
        {   
            $j++;
            foreach($item as $index => $subitem)
            {
                $lastArray[$j]['product_id'] = $subitem['product_id'];
                $sum = array_sum(array_column($item, 'quantity'));
                $lastArray[$j]['quantity'] = $sum;
            }
        }

        $topArray = collect($lastArray)->sortByDesc('quantity')->take($limit);

        $listProduct = $this->Product->whereIn('id', $topArray->pluck('product_id'))->get();

        foreach($listProduct as $product)
        {   
            //Price Product
            if($product->productDetail->min('price') == $product->productDetail->max('price')){

                if(count($product->productDetail) == 0){

                    $product->price = '0';
                }else{

                   $product->price = $product->productDetail->min('price'); 
                }
            }else{

               $product->price =  $product->productDetail->min('price'). '-' . $product->productDetail->max('price');
            }

            //Product Day Ago
            $product->date = getDayFromDate($product->created_at);

            foreach($topArray as $subItem){

                if($product->id == $subItem['product_id']){

                    $product->total_quantity = $subItem['quantity'];
                }
            }
        }

        return $listProduct;
    }

    public function listNewProduct()
    {
        $listNewProduct = $this->Product->orderBy('created_at', 'desc')->take(3)->get();

        foreach($listNewProduct as $product)
        {   
            //Price Product
            if($product->productDetail->min('price') == $product->productDetail->max('price')){

                if(count($product->productDetail) == 0){

                    $product->price = '0';
                }else{

                   $product->price = $product->productDetail->min('price'); 
                }
            }else{

               $product->price =  $product->productDetail->min('price'). '-' . $product->productDetail->max('price');
            }

            //Product Day Ago
            $product->date = getDayFromDate($product->created_at);
        }

        return $listNewProduct;
    }

    public function countProductWeek()
    {
        $array =[];
        $listBill = $this->Bill->getBillQuery()->where('status', 2)->whereDate('created_at', '>=', Carbon::today()->subWeek())->get();

        foreach($listBill as $item)
        {   
            $item->created_at_date = $item->created_at->format('d M');

            $array[$item->created_at_date]['date'] = $item->created_at_date;
            $array[$item->created_at_date]['quantity'][] = $item->billDetail->sum('quantity');
        }

        foreach($array as $index => $item){

            $array[$index]['quantity'] = array_sum($item['quantity']);
            
        }

        return array_values($array);
    }
} 