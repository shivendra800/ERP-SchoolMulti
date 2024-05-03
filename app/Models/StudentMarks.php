<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    use HasFactory;
    public function student(){
    	return $this->belongsTo(Student::class,'student_id','id');
    }

    public function student_class(){
    	return $this->belongsTo(ClassConfiger::class,'class_id','id');
    }


    public function student_year(){
    	return $this->belongsTo(StudentYear::class,'year_id','id');
    }

    public function subject(){
    	return $this->belongsTo(Subject::class,'assign_subject_id','id');
    }

    public function examtype(){
    	return $this->belongsTo(ExamType::class,'exam_type_id','id');
    }

    public function getschooldata()
    {
        return $this->belongsTo(Admin:: class,'school_id','id')->with('getschooldat');
    }

    public function getsection(){
        return $this->belongsTo(Section::class,'Section_id','id');
    }


}
