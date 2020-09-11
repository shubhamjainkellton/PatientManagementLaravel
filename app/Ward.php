<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $guarded = [];
    
    public function users() 
    {
        return $this->belongsToMany(User::class);
    }
    public function patients() 
    {
        return $this->belongsToMany(Patient::class);
    }
}
