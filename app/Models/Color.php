<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;
    protected $table = 'tp_color';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id',
        'code',
        'name'
    ];

    public function productDetail()
    {
        return $this->hasMany('App\Models\ProductDetail', 'color_id');
    }

    public function getColorQuery()
    {
        return $this->with('productDetail')
                    ->withCount('productDetail');
    }

}
