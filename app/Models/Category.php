<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'tp_category';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id',
        'parent_id',
        'name'
    ];

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'category_id');
    }

    public function categoryParent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function getCategoryQuery()
    {
        return $this->with('categoryParent')
                    ->with('category')
                    ->withCount('product');
    }
}
