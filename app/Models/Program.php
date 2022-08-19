<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lesson_id',
        'name',
        'source_code',
        'type'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'program_user', 'program_id', 'user_id')->withTimestamps();
    }

    public function userJoinedProgram($program_id)
    {
        if(ProgramUser::where('program_id', $program_id)->where('user_id', auth()->id())->count()) {
            return true;
        }
        return false;
    }
}
