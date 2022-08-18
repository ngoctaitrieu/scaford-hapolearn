<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $teachers = User::teachers()->get();
        $tags = Tag::all();
        $courses = Course::search($data)->paginate(config('variable.paginate'));

        return view('courses.index', compact('teachers', 'tags', 'courses', 'data'));
    }

    public function show($id, Request $request)
    {
        $data = $request->all();
        $courseDetail = Course::find($id);
        $courseTags = $courseDetail->tags;
        $courseLessons = $courseDetail->lessons()->search($data)->paginate(config('variable.paginate_10'));
        $otherCourses = Course::otherCourses()->whereNotIn('id', [$id])->get();
        $teacherCourses = $courseDetail->teachers;
        $userReviews = $courseDetail->reviews()->get();
        $isJoined = $courseDetail->isJoined()->count();
        $isFinished = $courseDetail->isFinished()->count();
        $userReviewed = $courseDetail->userReviewed()->count();

        return view('courses.show', compact(
            'courseDetail',
            'courseTags',
            'courseLessons',
            'otherCourses',
            'teacherCourses',
            'userReviews',
            'data',
            'isJoined',
            'isFinished',
            'userReviewed'
        ));
    }
}
