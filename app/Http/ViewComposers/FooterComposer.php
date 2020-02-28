<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Interfaces\BrandRepositoryInterface;

class FooterComposer 
{
	//Param
    protected $footer;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brand = $brandRepository;
    }

    public function compose(View $view)
    {	
    	//with Param
        $slider = $this->brand->getListBrand();
    	$view->with('footer', $slider);	
    }
}
