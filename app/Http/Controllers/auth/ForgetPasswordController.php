<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Hash;
use Mail;
use Str;
use Validator;

class ForgetPasswordController extends Controller
{
    public function forget_password()
    {
        return view('auth.forget-password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email',$request->email)->first();
        if($user){
            $otp = rand(100000,999999);
            $data = [
                'email'=> $user->email,
                'otp' => $otp,
                'name' => $user->first_name 
            ];
            // $this->send_mail($data);
            Mail::send('email.forget_password', compact('data'), function ($message) use ($data) {
                $message->to($data['email'])->subject('Forgot Password');
            });
            $insertdata['email'] = $user->email;
            $insertdata['token'] = $otp;
            $insertdata['created_at'] = date('Y-m-d H:i:s');
            DB::table('password_reset_tokens')->where('email', $user->email)->delete();
            DB::table('password_reset_tokens')->insert($insertdata);
            // return back()->with('success_message','Otp has been sent to your email');
            session()->flash('success_message','Otp has been sent to your email');
            return view('auth.otp-verify')->with('success_message','Otp has been sent to your email');
        }else{
            return back()->with('error_message','Email not found');
        }
    
    }

    public function verify_otp(Request $request){
       
        $request->validate([
            'otp' => 'required|integer',
        ]);

        $data = $request->only('otp');
        $user = DB::table('password_reset_tokens')->where('token',$data['otp'])->first();

        if($user){

                if($user->token == $data['otp']){
                    $token  = Str::random(60);
                    DB::table('password_reset_tokens')->where('email', $user->email)->update(['token'=> $token]);
                     session()->flash('success_message','OTP verify Success !!');
                     session()->forget('error_message');
                    return view('auth.new-password', compact('token'));
                }else{
                    session()->flash('error_message','Invalid OTP or Token Mismatch');
                    return view('auth.otp-verify')->with('error_message','Invalid OTP or Token Mismatch');
                }
           
        
        }else{
            // 
            session()->flash('error_message','Invalid OTP');
            return view('auth.otp-verify');
        
        }
    }

    public function reset_password_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            $token = $request->token;
            session()->flash('error_message','please make sure that password and confirm must be same');
            return view('auth.new-password', compact('token'));
        }
       
        $token = $request->token;
        $password = $request->password;
        $user = DB::table('password_reset_tokens')->where('token', $token)->first();
        if($user){
            $user_id = $user->email;
            $user = User::where('email', $user_id)->first();
            $user->password = Hash::make($password);
            $user->save();
            DB::table('password_reset_tokens')->where('email', $user_id)->delete();
            return redirect()->route('login')->with('success_message','Password changed successfully');
        }else{
            session()->flash('error_message','Token Mismatch Please Try Again');
            return view('auth.new-password', compact('token'));
        }
    
    
    }
}
