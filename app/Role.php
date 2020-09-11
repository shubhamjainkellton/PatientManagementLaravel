<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Permission;

class Role extends Model
{
    public function users() 
    {
        return $this->belongsTo(User::class);
    }


    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
