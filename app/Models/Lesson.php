<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\TimeCast;

class Lesson extends Model
{
    use HasFactory, HasUuids;
    protected $with = ["course"];

    use HasFactory,HasUuids;

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    protected $casts = [
        'start_time' => TimeCast::class,
        'end_time' => TimeCast::class
    ];
}
