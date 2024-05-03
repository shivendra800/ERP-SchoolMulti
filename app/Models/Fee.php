<?php

namespace App\Models;

use App\Models\Month;
use App\Models\ClassConfiger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;

    public function getmonth()
    {
        return $this->belongsTo(Month:: class,'month','id');
    }

    public function getclass()
    {
        return $this->belongsTo(ClassConfiger:: class,'class_id','id');
    }
    
    public function getstream()
    {
        return $this->belongsTo(Stream:: class,'stream_id','id');
    }

    public function getsection()
    {
        return $this->belongsTo(Section:: class,'section','id');
    }


    public function getfeepaid()
    {
        return $this->hasMany(StudentFee:: class,'month_id','month');
    }
}
