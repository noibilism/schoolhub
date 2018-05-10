<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_title', 'course_code', 'department_id', 'status'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
