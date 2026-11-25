<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'surname', 'email', 'phone', 'date_of_birth'];
    public function courses()
{
    return $this->belongsToMany(Course::class, 'course_student')
        ->withPivot('enrolled_at')
        ->withTimestamps();
}
}
