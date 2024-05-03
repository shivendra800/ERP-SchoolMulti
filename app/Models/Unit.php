<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public function student_class(){
        return $this->belongsTo(ClassConfiger::class,'assign_class_id','id');
    }
 
    public function school_subject(){
        return $this->belongsTo(Subject::class,'assign_subject_id','id');
    }
}
