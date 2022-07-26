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
        $course = new Course();
        $getThreeCourses = $course->mainCourses()->get();
        $getThreeOtherCourses = $course->otherCourses()->get();
        $countCourse = $course->count();

        $review = new Review();
        $getReviews = $review->getReviews()->get();

        $lesson = new Lesson();
        $countLesson = $lesson->count();

        $courseUser = new CourseUser();
        $countLearner = $courseUser->countLearner()->get()->count();

        return view('home', compact('getThreeCourses', 'getThreeOtherCourses', 'getReviews', 'countCourse', 'countLesson', 'countLearner'));
    }
}
