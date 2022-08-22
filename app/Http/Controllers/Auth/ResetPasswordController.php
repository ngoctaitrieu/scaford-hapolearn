<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function showResetForm($token, Request $request)
    {
        $passwordReset = PasswordReset::where('email', $request['email'])->first();
        if ($passwordReset && $token == $passwordReset->token) {
            return view('auth.passwords.reset')->with(
                ['token' => $token, 'email' => $request->email]
            );
        }
        return abort(404);
    }

    public function reset(ResetPasswordFormRequest $request)
    {
        $passwordReset = PasswordReset::where([
            'email' => $request['email'],
            'token' => $request['token'],
        ]);
        
        if(!$passwordReset)
            return redirect()->back()->with('status', __('reset-password.invalid_token'));
        
        User::where('email', $request['email'])->update([
            'password' => Hash::make($request['password']),
        ]);
        $passwordReset->delete();

        return redirect('/login')->with('status', __('reset-password.password_change_success'));
    }
}
