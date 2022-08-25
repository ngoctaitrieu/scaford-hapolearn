<?php

namespace App\Http\Middleware;

use App\Models\Review;
use Closure;
use Illuminate\Http\Request;

class CheckUser
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
        $userId = Review::where('id', $request->route('review'))->first();

        if (!($userId['user_id'] == auth()->id())) {
            return redirect()->back()->with('message', 'Hành động không hợp lệ. Mời thử lại!');
        }

        return $next($request);
    }
}
