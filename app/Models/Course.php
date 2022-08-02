<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'description',
        'price'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tag', 'course_id', 'tag_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'course_teacher', 'course_id', 'user_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id');
    }

    public function scopeMainCourses($query)
    {
        return $query->take(config('variable.num_courses_home'));
    }

    public function scopeOtherCourses($query)
    {
        return $query->skip(config('variable.skip_courses_home'))->take(config('variable.num_courses_home'));
    }

    public function getTotalLearnersAttribute()
    {
        return $this->users()->count();
    }

    public function getTotalLessonsAttribute()
    {
        return $this->lessons()->count();
    }

    public function getTotalTimesAttribute()
    {
        return $this->lessons()->sum(config('variable.sum'));
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['keyword'])) {
            $query->where('name', 'LIKE', "%" . $data['keyword'] . "%")->orWhere('description', 'LIKE', "%" . $data['keyword'] . "%");
        }

        if (isset($data['created_time']) && $data['created_time'] == config('variable.sort_by_newest')) {
            $query->orderBy('created_at', config('variable.orderby_direction'));
        }

        if (isset($data['teachers'])) {
            $query->whereHas('teachers', function ($query) use ($data) {
                $query->whereIn('user_id', $data['teachers']);
            });
        }

        if (isset($data['learner'])) {
            $query->withCount('users')->orderBy('users_count', $data['learner']);
        }

        if (isset($data['time'])) {
            $query->withSum('lessons', 'time')->orderBy('lessons_sum_time', $data['time']);
        }

        if (isset($data['lesson'])) {
            $query->withCount('lessons')->orderBy('lessons_count', $data['lesson']);
        }

        if (isset($data['tags'])) {
            $query->whereHas('tags', function ($query) use ($data) {
                $query->whereIn('tag_id', $data['tags']);
            });
        }

        if (isset($data['review'])) {
            $query->withCount('reviews')->orderBy('reviews_count', $data['review']);
        }

        return $query;
    }
}
