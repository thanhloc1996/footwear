<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGroup extends Model
{
    use SoftDeletes;
    protected $table = 'tp_user_group';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id',
        'name'
    ];

    public function user(){

        return $this->belongsTo('App\Models\User', 'group_id');
    }

    public function getUserGroupQuery(){
        return $this->with('user');

    }
}
