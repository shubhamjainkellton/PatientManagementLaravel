<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = [];
    public function users() 
    {
        return $this->belongsToMany(User::class, 'doc_id', 'role_id');
    }
    public function appointments() 
    {
        return $this->belongsToMany(Appointments::class);
    }
    public function wards() 
    {
        return $this->belongsTo(Ward::class);
    }
}
