<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Str;


class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'desc')->where('user_type',0)->get();
        // dd($user);
        return view('admin.user.index',compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'user_type' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['uuid'] = uniqid();
        $data['username'] = $data['first_name'] . '-' . $data['last_name'];
        // dd($data);
        $user = User::create($data);

        return redirect()->route('user.index')->with('success_message', 'User created successfully.');
    
    }

    public function edit($id)
    {
        $data = User::findorFail($id);
        return view('admin.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|unique:users,phone,'.$id,
            'user_type' => 'required',
        ]);

        $data = $request->all();
        $user = User::findOrFail($id);
        if(isset($data['image'])){
            User::deleteFile($user->image);
            $data['image'] = User::uploadFile($data['image']);
        }
       
        $user->update($data);

        return redirect()->route('user.index')->with('success_message', 'User updated successfully.');
    
    }

    public function admin_all()
    {
        $admin = User::where('user_type', 2)->where('is_admin',1)->orderBy('id', 'desc')->get();
        return view('admin.user.admin', compact('admin'));
    }

    public function blocked_user()
    {
        $blocked = User::where('is_blocked',0)->orderBy('id', 'desc')->get();
        return view('admin.user.blocked_user', compact('blocked'));
    }

}
