<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecideClassPeriod extends Model
{
    use HasFactory;

    public function student_class(){
        return $this->belongsTo(ClassConfiger::class,'class_id','id');
    }
 
    public function school_subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function getyears(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }
    public function getweek(){
        return $this->belongsTo(WeekDay::class,'week_days','id');
    }

    public function getstream(){
        return $this->belongsTo(Stream::class,'stream_id','id');
    }

    public function getsection(){
        return $this->belongsTo(Section::class,'Section_id','id');
    }

    public function getteacher(){
        return $this->belongsTo(Staff::class,'teacher_id','id');
    }
}
