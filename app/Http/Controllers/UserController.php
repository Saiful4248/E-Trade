<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Http\Requests\StoreuserRequest;
use App\Http\Requests\UpdateuserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
function login(Request $req)
{
    //return User::where("email", $req->email)->first();
    $user=user::where("email", $req->email)->first();

    if(!$user || !Hash::check($req->password, $user->password))
     {
        return"Username or Password is not match";
     }
    else {
        $req->session()->put('user',$user);
        return redirect('/');
        
     }
}
public function logout(Request $request)
{
    $request->session()->forget('user');
    return redirect('/login')->with('success', 'You have been logged out successfully');
}

public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $request->session()->put('user', $user);

        return redirect('/')->with('success', 'Registration successful');
    }
}
