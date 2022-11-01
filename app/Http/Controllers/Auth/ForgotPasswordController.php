<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    public function sendForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = \Str::random(64);

        \DB::table('password_resets')->insert([
            'email' => $request -> email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('reset.password.get', ['token' => $token, 'email' => $request->email]);
        $body = "We are received a request to reset the password for <b> CTOS </b> account associated with " .$request->email. ". You can reset your password by clicking the link below";



        \Mail::send('email.forgetPassword', ['action_link' => $action_link, 'body' => $body], function($message) use ($request){
            $message->to($request['email']);
            $message->subject('Reset Password');
        });

        \Session::flash('success',"We have emailed you the password reset link. Please check.");
        return back();
    }

    public function showResetPasswordForm(Request $request, $token = null)
    {
        return view('auth.forgetPasswordLink', ['token' => $token,'email'=>$request->email]);
    }

    public function sendResetPasswordForm(Request $request)
    {
        $email = $request->email;
        
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = \DB::table('password_resets')->where([
            'email' => $email,
            'token' => $request->token
        ])
        ->first();

        if(!$check_token)
        {
            return back()->withInput()->with('error','Invalid token!');
        }
        else{
            User::where('email', $email)->update([
                'password' => \Hash::make($request->password)
            ]);
            \DB::table('password_resets')->where([
                'email' => $email
                ])->delete();
        }
        return redirect()->route('login')->with('success', 'Your password has been changed');
    }

}