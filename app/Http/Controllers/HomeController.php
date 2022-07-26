<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Lesson;
use App\Models\Review;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mainCourses = Course::mainCourses()->get();
        $otherCourses = Course::otherCourses()->get();
        $totalCourse = Course::count();
        $mainReviews = Review::mainReviews()->get();
        $totalLesson = Lesson::count();
        $learners = CourseUser::learners()->get()->count();

        return view('home', compact('mainCourses', 'otherCourses', 'mainReviews', 'totalCourse', 'totalLesson', 'learners'));
    }
}
