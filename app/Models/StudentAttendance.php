<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;

    public function getstudent(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    public function getclass(){
        return $this->belongsTo(ClassConfiger::class,'class_id','id');
    }
    public function getsubject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function getsection(){
        return $this->belongsTo(Section::class,'section_id','id');
    }

    public function getschooldata()
    {
        return $this->belongsTo(Admin:: class,'school_id','id')->with('getschooldat');
    }

    public function getteachername()
    {
        return $this->belongsTo(Admin:: class,'staff_id','id');
    }

     

}
