<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Requests extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'teacher_id',
        'student_id',
        'booking_date',
        'booking_status'
    ];
}
