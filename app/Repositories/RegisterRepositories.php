<?php 
namespace App\Repositories; 
use Illuminate\Support\ServiceProvider; 
class RegisterRepositories extends ServiceProvider 
{ 
  public function register() 
  { 
 
        $this->app->bind( 
           'App\Repositories\Interfaces\BaseRepositoryInterface', 
           'App\Repositories\Repository\BaseRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\BillDetailRepositoryInterface', 
           'App\Repositories\Repository\BillDetailRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\BillRepositoryInterface', 
           'App\Repositories\Repository\BillRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\BrandRepositoryInterface', 
           'App\Repositories\Repository\BrandRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\CategoryRepositoryInterface', 
           'App\Repositories\Repository\CategoryRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\ColorRepositoryInterface', 
           'App\Repositories\Repository\ColorRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\CommentRepositoryInterface', 
           'App\Repositories\Repository\CommentRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\FeedbackRepositoryInterface', 
           'App\Repositories\Repository\FeedbackRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\GalleryRepositoryInterface', 
           'App\Repositories\Repository\GalleryRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\ProductDetailRepositoryInterface', 
           'App\Repositories\Repository\ProductDetailRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\ProductRepositoryInterface', 
           'App\Repositories\Repository\ProductRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\SpecificationRepositoryInterface', 
           'App\Repositories\Repository\SpecificationRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\UserGroupRepositoryInterface', 
           'App\Repositories\Repository\UserGroupRepository' 
 
        ); 
        $this->app->bind( 
           'App\Repositories\Interfaces\UserRepositoryInterface', 
           'App\Repositories\Repository\UserRepository' 
 
        ); 
  } 
} 
