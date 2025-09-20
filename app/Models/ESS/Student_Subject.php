<?php

namespace App\Models\ESS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Subject extends Model
{
    use HasFactory;
    protected $table = 'student_subject';
    protected $fillable = [
        'student_id',
        'subject_id',
        'degree',
    ];
}
