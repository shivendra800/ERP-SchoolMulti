<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $gurad = 'admin';

    public function getschooldat()
    {
        return $this->belongsTo(SchoolRegistation:: class,'school_id','id');
    }

    
    
}
