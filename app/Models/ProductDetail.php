<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{
    use SoftDeletes;
    protected $table = 'tp_product_detail';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id',
        'product_id',
        'color_id',
        'size',
        'name',
        'image',
        'price',
        'status',
        'quantity'
    ];

    public function product(){

        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function color(){

        return $this->belongsTo('App\Models\Color', 'color_id');
    }

    public function getProductDetailQuery(){
        return $this->with('product')
                    ->with('color');
    }
}
