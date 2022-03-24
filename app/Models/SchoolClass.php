<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function student()
    {
        return $this->hasMany(Student::class);
    }
    public function timetable()
    {
        return $this->hasMany(Timetable::class);
    }
}
