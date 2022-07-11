<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'avatar',
        'date_of_birth',
        'address',
        'phone',
        'about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courseUsers()
    {
        return $this->belongsToMany(Course::class, 'CourseUser', 'user_id', 'course_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'LessonUser', 'user_id', 'lesson_id');
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'ProgramUser', 'user_id', 'program_id');
    }

    public function courseTeacher()
    {
        return $this->belongsToMany(Course::class, 'CourseTeacher', 'user_id', 'course_id');
    }
}
