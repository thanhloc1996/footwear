<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'tp_product';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id',
        'category_id',
        'brand_id',
        'name',
        'image',
        'status',
        'description'
    ];

    public function category(){

        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function brand(){

        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }
    public function gallery(){

        return $this->hasMany('App\Models\Gallery', 'product_id');
    }
    public function comment(){

        return $this->hasMany('App\Models\Comment', 'product_id');
    }

    public function productDetail(){

        return $this->hasMany('App\Models\ProductDetail', 'product_id');
    }
    public function specification(){

        return $this->hasOne('App\Models\Specification', 'product_id');
    }

    public function getProductQuery(){
        return $this->with('category')
                    ->with('category.category')
                    ->with('brand')
                    ->with('gallery')
                    ->with('comment')
                    ->with('comment.user')
                    ->withCount('comment')
                    ->with('productDetail')
                    ->with('productDetail.color')
                    ->with('specification');
    }
}
