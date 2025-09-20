<?php

namespace App\Models\ESS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;
    protected $table = 'grades';
    protected $fillable = [
        'name',
    ];
    public function students()
    {
        return $this->hasMany(Students::class);
    }
    public function classrooms()
    {
        return $this->hasMany(Classrooms::class);
    }
}
