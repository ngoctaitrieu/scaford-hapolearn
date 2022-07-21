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
        $getThreeCourses = $course->getCourses(0, config('variable.num_courses_home'))->get();
        $getThreeOtherCourses = $course->getCourses(config('variable.skip_courses_home'), config('variable.num_courses_home'))->get();
        $countCourse = $course->countCourse()->count();

        $review = new Review();
        $getReviews = $review->getReviews(config('variable.num_reviews_home'))->get();

        $lesson = new Lesson();
        $countLesson = $lesson->countLesson()->count();

        $courseUser = new CourseUser();
        $countLearner = $courseUser->countLearner()->get()->count();

        return view('home', compact('getThreeCourses', 'getThreeOtherCourses', 'getReviews', 'countCourse', 'countLesson', 'countLearner'));
    }
}
