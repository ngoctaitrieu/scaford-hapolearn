<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
    ];

    public function programs()
    {
        return $this->hasMany(Program::class, 'lesson_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'lesson_user', 'lession_id', 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['keyword'])) {
            return $query->where('name', 'LIKE', '%' . $data['keyword'] . '%');
        }
        return $query;
    }

    public function getTotalProgramsAttribute()
    {
        return $this->programs()->count();
    }

    public function getProgressAttribute()
    {
        $programLearned = Program::whereHas('users', function ($query) {
            $query->where('users.id', auth()->id())->where('programs.lesson_id', $this->id);
        })->count();

        $total = $this->programs->count();

        return $total == 0 ? 0 : round(($programLearned / $total) * 100, 2);
    }
}
