<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class SingleSession extends Model
{
    protected $with = ["teacher"];

    use HasFactory,HasUuids;
    protected $fillable = [
        'teacher_id',
        'student_id',
        'progress',
        'status',
    ];
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
}
