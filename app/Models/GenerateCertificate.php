<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateCertificate extends Model
{
    use HasFactory;

    public function student_year(){
    	return $this->belongsTo(StudentYear::class,'year_id','id');
    }

    public function ownername(){
    	return $this->belongsTo(Admin::class,'admin_id','id');
    }

    public function getschooldata()
    {
        return $this->belongsTo(Admin:: class,'school_id','id')->with('getschooldat');
    }
}
