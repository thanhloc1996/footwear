<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{   
    use SoftDeletes;
    protected $table = 'tp_brand';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'image'
    ];

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'brand_id');
    }

    public function getBrandQuery()
    {
        return $this->withCount('product');
    }
}
