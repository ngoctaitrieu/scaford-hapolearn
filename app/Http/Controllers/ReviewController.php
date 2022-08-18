<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewFormRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateReviewFormRequest;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewFormRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();

        Review::create($data);

        return redirect()->back()->with('status', 'active');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewFormRequest $request, $id)
    {
        Review::find($id)->update($request->all());
        return back()->with('status', 'active');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Review::find($id)->delete();
        return back()->with('status', 'active');
    }
}
