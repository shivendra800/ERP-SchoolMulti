<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function classdata()
    {
        return $this->belongsTo(ClassConfiger:: class,'class','id');
    }
    public function sectiondata()
    {
        return $this->belongsTo(Section:: class,'section','id');
    }

    public function getschooldata()
    {
        return $this->belongsTo(Admin:: class,'school_id','id')->with('getschooldat');
    }

    // public function getschooldatareg()
    // {
    //     return $this->belongsTo(SchoolRegistation:: class,'school_id','id');
    // }
}
