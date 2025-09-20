<?php

namespace App\Models\ESS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classrooms extends Model
{
    use HasFactory;
    protected $table = 'classrooms';
    protected $fillable = [
        'name',
        'grade_id',
    ];

    public function grade()
    {
        return $this->belongsTo(Grades::class);
    }
}
