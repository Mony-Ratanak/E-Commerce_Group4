<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {
        $userFound = User::where('email', $request->get('email'))->first();
     
        if ($userFound) {
             return response(["message"=> 'User with this email exist'], 400);
     
        } else {
            // 2. Verify if confirm_password and password match
            if ($request->get('password') == $request->get('confirm_password')) {
     
                $user = new User();

                // 3. Encrypt password
                $user->name = $request->get('username');

                $user->email = $request->get('email');
                $user->password = bcrypt($request->get('password'));

                // 4. Save user record

                $user->save();

                //5. Send OTP to email
                $otp = mt_rand(100088, 999999);

                // Save OTP in the database or cache for verification
                // For demonstration purposes, we'll save it in the session

                $request->session()->put('otp', $otp);

                $request->session()->put('userId', $user->id);
                // Send OTP via email

                Mail::to($user->email)->send(new OtpMail('http://locahost:9000/verify_otp?code='.$otp));

                return ["message" => "success"];

            } else {
                return response(["message"=>"Password and confirm password is not matched"], 400);

            }
        }

    }

     
    
    public function login(Request $request) {

    }
    public function verifyOTP(Request $request) {

    } 
}
