<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;
use Mail;

class AuthController extends Controller
{
    public function admin_login()
    {
        return view('auth.admin.login');
    }

    public function admin_login_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            if(Auth::user()->is_admin == 1 && Auth::user()->is_blocked == 0) {
            return redirect()->intended(route('admin.index'));
            } else {
                Auth::logout();
                return back()->with('error_message', 'You cannot access this system, Please contact Admin Team');
            }
        }

        return back()->with('error_message', 'Invalid credentials');
    }

    public function updateProfile()
    {
        return view('auth.admin.profile');
    }
    public function updateProfileSubmit(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required'
        ]);
        $user = User::find(auth()->user()->id);
       

        $credentials = $request->only('first_name','last_name','phone','date_of_birth','address','image');
        if($request->hasFile('image')){
            $image = $request->file('image');
            User::deleteFile($user->image);
            $credentials['image'] = User::uploadFile($image);
        }
    //    ['password'] = bcrypt(12);
        // dd($credentials);
        $user->update($credentials);
        return redirect()->route('admin.profile')->with('success_message','Profile Update Succesfully');
    
    }

    public function changePassword()
    {
        return view('auth.admin.change_password');
    }
    public function changePasswordSubmit(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::find(auth()->user()->id);
        if(!Hash::check($request->old_password,$user->password)){
            return back()->with('error_message','Old password is incorrect');
        }elseif($request->old_password == $request->password){
            return back()->with('error_message','New password cannot be same as old password');
        }else{
            $data['password'] = Hash::make($request->password);
            $user->update($data);
            return back()->with('success_message','Password changed successfully');
        }
    }

   

    public function logout()
    { 
        Auth::logout();
        return redirect()->route('login')->with('success_message','Logout Succesfully');
    }

    
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('user.dashboard');
        }else{
            return view('auth.login');
        }
        
        
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_submit(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'=> 'required',
            'email'=> 'required|email|max:255|unique:users',
            'password'=> 'required|min:8',
            'confirm_password'=> 'required|same:password',

        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['username'] = $data['first_name'].' '.$data['last_name'];
        $data['uuid'] = Str::uuid();
        $data['user_type'] = 'user';
        $user = User::create($data);
        $data['name'] = $data['first_name'].' '.$data['last_name'];
        Mail::send('email.registration', compact('data'), function($message) use ($data) {
            $message->to($data['email'])->subject('Registration Successfull');
        });
        return redirect()->route('login')->with('success_message','Registration Successfully');

    }
    public function user_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->is_admin == 1) {
                Auth::logout();
                return back()->with('error_message', 'You are unauthorize to access this system');
            } elseif(Auth::user()->is_blocked == 1) {
                Auth::user()->logout();
                return back()->with('error_message', 'You are Blocked From System. Please Contact With Support Team');
            }else{
                return redirect()->intended(route('user.dashboard'));
                // return redirect()->route('user_account.index');
            }
        }
           
            return back()->with('error_message', 'Invalid credentials');
    }

    public function guest_register(Request $request)
    {
        $request->validate([
            'email'=> 'required|email|max:255|unique:users',
            'password'=> 'required|min:8',
           

        ]);
        $data = $request->all();
        $data['first_name'] = 'Guest';
        $data['last_name'] = 'User';
        $data['password'] = Hash::make($request->password);
        $data['uuid'] = Str::uuid();
        User::create($data);
        Mail::send('email.registration', compact('data'), function($message) use ($data) {
            $message->to($data['email'])->subject('Registration Successfull');
        });
        return redirect()->route('login')->with('success_message','Registration Successfully');

    }
}
