<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email|max:2048',
            'password' => 'required',
        ]);
        $this->password = bcrypt($request->password);
    
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('status','Your creadentials can not be verified');
        }
        return redirect('/');
    }

    public function registerPage(){
        return view('register');
    }
    public function register(Request $request){
        $fields = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|unique:users,username|string|max:255',
            'email' => 'required|email|unique:users,email|max:2048',
            'address' => 'required|string|max:255',
            'password' =>'required|confirmed|min:8|max:50'
        ]);

        $fields['password'] = bcrypt($request->password);

        $user = User::create($fields);
        if(!$user){
            return back()->with('status','Whoops an error occured while create your account');
        }

        // Mail::to($user->email)->send(new WelcomeMail($user));
        auth()->login($user);
        return redirect('/');
    }

    public function destroy(){
        auth()->logout();
        return redirect('/');
    }
}
