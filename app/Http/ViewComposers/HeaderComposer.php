<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Cart;

class HeaderComposer 
{
	//Param
    protected $dataHeader;

    public function __construct(
        BrandRepositoryInterface $brandRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->brand = $brandRepository;
        $this->category = $categoryRepository;
    }

    public function compose(View $view)
    {	
    	//with Param
        $result['listCategoryParent'] = $this->category->getListCategoryParent();
        $result['listBrand'] = $this->brand->getListBrand();
        $result['listCategory'] = $this->category->getListCategory();
        $result['cartCount'] = !empty(Cart::count()) ? Cart::count() : 0;
        $result['cartTotal'] = !empty(Cart::total()) ? Cart::total() : 0;

    	$view->with('dataHeader', $result);	
    }
}
