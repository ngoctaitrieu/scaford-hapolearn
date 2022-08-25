<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        $otherCourses = Course::otherCourses()->whereNotIn('id', [$lesson['course_id']])->get();
        $courseTags = Course::find($lesson['course_id'])->tags;
        $programs = $lesson->programs;
        $programUsers = User::find(auth()->id())->programUsers;

        return view('lessons.show', compact('lesson', 'otherCourses', 'courseTags', 'programs', 'programUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back();
    }
}
