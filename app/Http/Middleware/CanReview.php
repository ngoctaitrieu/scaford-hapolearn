<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Closure;
use Illuminate\Http\Request;

class CanReview
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $course = Course::find($request['course_id']);

        if (!$course->isJoined()->count() || $course->isFinished()->count()) {
            return redirect()->back()->with('message', __('course-detail.need_join'));
        }
        
        if ($course->userReviewed()->count() && !isset($request['parent_id'])) {
            return redirect()->back()->with('message', __('course-detail.just_one_reviews'));
        }
        
        return $next($request);
    }
}
