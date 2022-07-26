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
        $getThreeCourses = Course::mainCourses()->get();
        $getThreeOtherCourses = Course::otherCourses()->get();
        $countCourse = Course::count();
        $getFourReviews = Review::getReviews()->get();
        $countLesson = Lesson::count();
        $learners = CourseUser::countLearner()->get()->count();

        return view('home', compact('getThreeCourses', 'getThreeOtherCourses', 'getFourReviews', 'countCourse', 'countLesson', 'learners'));
    }
}
