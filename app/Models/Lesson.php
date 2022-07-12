<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lesson_name',
        'image',
    ];

    public function programs()
    {
        return $this->hasMany(Program::class, 'lesson_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'lesson_users', 'lession_id', 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
