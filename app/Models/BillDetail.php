<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillDetail extends Model
{
    use SoftDeletes;
    protected $table = 'tp_bill_detail';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id',
        'bill_id',
        'product_detail_id',
        'quantity',
        'total',
    ];

    public function bill()
    {
        return $this->belongsTo('App\Models\Bill', 'bill_id');
    }

    public function productDetail()
    {
        return $this->belongsTo('App\Models\ProductDetail', 'product_detail_id');
    }

    public function getBill_detailQuery()
    {
        return $this->with('bill')
                    ->with('productDetail')
                    ->with('productDetail.product');
    }
}
