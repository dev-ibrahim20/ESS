<?php

namespace App\Models\ESS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'phone',
        'email',
        'address',
        'birthday',
        'gender',
        'religion',
        'blood_group',
        'classroom_id',
        'grade_id',
        'roll_number',
        'photo_path',
    ];

    public function grade()
    {
        return $this->belongsTo(Grades::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classrooms::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getEmailAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPhoneAttribute($value)
    {
        return '+20 ' . $value;
    }
}
