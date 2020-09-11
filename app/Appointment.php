<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = [];
    public function users() 
    {
        return $this->belongsTo(User::class, 'doc_id', 'role_id');
    }
    public function patients() 
    {
        return $this->belongsTo(Patient::class);
    }
}
