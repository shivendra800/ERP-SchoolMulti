<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    public function staff_data(){
    	return $this->belongsTo(Staff::class,'staff_id','id');
    }

    public function student_data(){
    	return $this->belongsTo(Student::class,'student_id','id');
    }

    public function class_data(){
    	return $this->belongsTo(ClassConfiger::class,'class_id','id');
    }

    public function section_data(){
    	return $this->belongsTo(Section::class,'section_id','id');
    }

    public function stream_data(){
    	return $this->belongsTo(Stream::class,'stream_id','id');
    }

   

}
