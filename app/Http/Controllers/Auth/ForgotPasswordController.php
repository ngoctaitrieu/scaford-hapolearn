<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Requests\ResetEmailFormRequest;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(ResetEmailFormRequest $request)
    {
        $token = Str::random(10);
        $email = $request['email'];

        PasswordReset::create([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        
        
        Mail::send('test', compact('email', 'token'), function ($email) use ($request) {
            $email->subject(__('reset-password.password_update_notify'));
            $email->to($request['email']);
        });

        return redirect()->back()->with('status', __('reset-password.password_notify_sended'));
    }
}
