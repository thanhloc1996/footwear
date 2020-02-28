<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends Model
{
    use SoftDeletes;
    protected $table = 'tp_specification';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id',
        'product_id',
        'material',
        'gender',
        'trendy',
        'weight'
    ];

    public function product(){

        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function getSpecificationQuery(){
        return $this->with('product');

    }
}
