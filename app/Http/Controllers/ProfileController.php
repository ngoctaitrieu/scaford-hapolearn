<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use App\Services\UserService;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userDetail = User::find(auth()->id());
        $courses = $userDetail->courses()->get();
        return view('profiles.index', compact('userDetail', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileFormRequest $request, $id)
    {
        if ($request->has('image_upload')) {
            $request['avatar'] = UserService::handleUploadImage($request->file('image_upload'));
        }
        User::find($id)->update(array_filter($request->all()));
        return redirect()->back();
    }
}
