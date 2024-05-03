<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTecherSubject extends Model
{
    use HasFactory;

    public function student_class(){
        return $this->belongsTo(ClassConfiger::class,'class_id','id');
    }
 
    public function school_subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function getsubjectteacher(){
        return $this->belongsTo(Staff::class,'teacher_id','id')->select('id','name');
    }

    public function getteachertimtable(){
        return $this->belongsTo(DecideClassPeriod::class,'teacher_id','teacher_id');
    }
}
