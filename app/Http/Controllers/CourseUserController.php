<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseUserRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseUser;

class CourseUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseUserRequest $request)
    {
        $course = Course::find($request['course_id']);
        $course->users()->attach(auth()->user()->id);

        return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        CourseUser::withTrashed()->where([
            'course_id' => $id,
            'user_id' => auth()->id()
        ])->restore();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseUser::where([
            'course_id' => $id,
            'user_id' => auth()->id()
        ])->delete();

        return redirect()->back();
    }
}
