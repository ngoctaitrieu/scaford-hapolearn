<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramUser;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!ProgramUser::where(['user_id' => auth()->id(), 'program_id' => $request['program_id']])->count()) {
            $program = Program::find($request['program_id']);
            $program->users()->attach(auth()->user()->id);
        }
       
        return redirect()->to($request['source_code']);
    }
}
