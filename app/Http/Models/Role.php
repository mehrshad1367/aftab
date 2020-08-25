<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public $table = 'roles';

    public function user(){
        return $this->hasMany(User::class,'role_id');
    }

    public function service(){
        return $this->belongsToMany(Service::class, 'roles_services', 'role_id','service_id');
    }
}
