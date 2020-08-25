<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function role(){
        return $this->belongsToMany(Role::class);
    }
}
