<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function stream()
    {
        return $this->belongsTo(Stream:: class,'stream_id','id');
    }
    public function class()
    {
        return $this->belongsTo(ClassConfiger:: class,'class_id','id');
    }
}
