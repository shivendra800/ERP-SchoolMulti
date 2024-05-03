<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    use HasFactory;

    public function student(){
    	return $this->belongsTo(Student::class,'student_id','id');
    }

    public function getschooldata()
    {
        return $this->belongsTo(Admin:: class,'school_id','id');
    }



    public function student_class(){
    	return $this->belongsTo(ClassConfiger::class,'class_id','id');
    }


    public function student_year(){
    	return $this->belongsTo(StudentYear::class,'year_id','id');
    }

    public  function getassign_class(){

    	return $this->hasMany(AssignSubject::class,'class_id','class_id');
    }

    
    public function student_section(){
    	return $this->belongsTo(Section::class,'section','id');
    }

    
    public function student_stream(){
    	return $this->belongsTo(Stream::class,'stream','id');
    }

    public function student_more_detail(){
    	return $this->belongsTo(StudentMoreDetails::class,'student_id','student_id');
    }


   

    


    



 


    

}
