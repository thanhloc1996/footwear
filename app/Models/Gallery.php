<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;
    protected $table = 'tp_gallery';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id',
        'product_id',
        'url'
    ];

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'product_id');
    }

    public function getGalleryQuery()
    {
        return $this->with('product');
    }
}
