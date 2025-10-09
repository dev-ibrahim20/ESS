<?php

namespace App\Models\ESS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'photo',
        'grade_id',
        'classroom_id',
        'subject_id',
        'section_id',
    ];

    public function grade()
    {
        return $this->belongsTo(Grades::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classrooms::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }

    public function section()
    {
        return $this->belongsTo(Sections::class);
    }
}
