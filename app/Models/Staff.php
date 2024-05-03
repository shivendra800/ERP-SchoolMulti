<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public function getschooldata()
    {
        return $this->belongsTo(Admin:: class,'school_id','id')->with('getschooldat');
    }
}
