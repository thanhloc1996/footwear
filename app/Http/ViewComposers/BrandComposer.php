<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Interfaces\BrandRepositoryInterface;

class BrandComposer 
{
	//Param
    protected $listBrand;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brand = $brandRepository->getListBrand();
    }

    public function compose(View $view)
    {	
    	//with Param
    	$view->with('listBrand', $this->brand);	
    }
}
