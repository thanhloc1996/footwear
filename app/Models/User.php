<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    protected $table = 'tp_user';
    protected $dates = ['deleted_at'];
    protected $appends = ['full_name'];
    public $timestamps = true;

    protected $fillable = [
        'id',
        'username',
        'group_id',
        'first_name',
        'last_name',
        'image',
        'address',
        'email',
        'password',
        'gender',
        'phone',
        'provider',
        'provider_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userGroup(){

        return $this->belongsTo('App\Models\UserGroup', 'group_id');
    }
    public function bill(){

        return $this->hasOne('App\Models\Bill', 'user_id');
    }
    public function comment(){

        return $this->hasMany('App\Models\Comment', 'user_id');
    }

    public function getFullNameAttribute(){

       return $this->attributes['first_name'] .' '. $this->attributes['last_name'];
    }

    public function getUserQuery(){
        return $this->with('userGroup')
                    ->with('bill')
                    ->with('comment');
    }
}
