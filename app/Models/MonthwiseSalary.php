<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthwiseSalary extends Model
{
    use HasFactory;

    public function staffdetails()
    {
        return $this->belongsTo(Staff:: class,'staff_id','id');
    }

    public function getschooldetails()
    {
        return $this->belongsTo(Admin:: class,'school_id','id')->with('getschooldat');
    }
}
