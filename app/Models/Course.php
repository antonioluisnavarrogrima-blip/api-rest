<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [];
    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student')
            ->withPivot('enrolled_at')
            ->withTimestamps();
    }
}