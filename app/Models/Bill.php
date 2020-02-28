<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bill extends Model
{
    use SoftDeletes;
    protected $table = 'tp_bill';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id',
        'address',
        'phone',
        'status',
        'note',
        'total',
        'date_receive',
        'date_delivery',
        'paypal_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function billDetail()
    {
        return $this->hasMany('App\Models\BillDetail', 'bill_id');
    }
    
    public function getBillQuery(){
        return $this->with('user')
                    ->with('billDetail.productDetail')
                    ->with('billDetail.productDetail.product');
    }
}
