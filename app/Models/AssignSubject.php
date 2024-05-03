<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

    public function student_class(){
        return $this->belongsTo(ClassConfiger::class,'class_id','id');
    }
 
    public function school_subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function schoolsubject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
}
