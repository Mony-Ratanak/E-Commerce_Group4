<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;

class AuthControoler extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function showPassword(){
        return view('auth.forgot_password');
    }

    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:5|max:12'
        ]);
        $user = new User(); 
        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success','You have been successfully registered!');
        } else{
            return back()->with('fail',"Something went wrong, try again later!");
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'name'=> 'required',
            'password'=> 'required|min:5|max:12'
        ]);

        $user = User::where('name', '=' , $request->name)->first();
        if($user){
            if (Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail',"password is not matches");
            }
        } else{
            return back()->with('fail',"user is not register");
       
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'new_password' => 'required|min:5|max:12',
            'confirm_password' => 'required|min:5|max:12|same:new_password',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('fail', "Email not found.");
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', "Password reset successful. You can now log in with your new password.");
    }
}
