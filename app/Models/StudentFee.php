<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    use HasFactory;

    public function getmonth()
    {
        return $this->belongsTo(Month:: class,'month_id','id');
    }
    public function getclass()
    {
        return $this->belongsTo(ClassConfiger:: class,'class_id','id');
    }

    public function getyear()
    {
        return $this->belongsTo(StudentYear:: class,'year_id','id');
    }
    public function student(){
    	return $this->belongsTo(Student::class,'student_id','id');
    }

    public function getschooldata()
    {
        return $this->belongsTo(Admin:: class,'school_id','id')->with('getschooldat');
    }
}
