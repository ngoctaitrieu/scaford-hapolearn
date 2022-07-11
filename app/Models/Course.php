<?php

namespace App\Models;

use App\Models\Course as ModelsCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_name',
        'image',
        'description',
        'price'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'Course_tag', 'course_id', 'tag_id');
    }

    public function userCourses()
    {
        return $this->belongsToMany(User::class, 'Course_user', 'course_id', 'user_id');
    }

    public function userTeacher()
    {
        return $this->belongsToMany(User::class, 'Course_teacher', 'course_id', 'user_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id');
    }
}
