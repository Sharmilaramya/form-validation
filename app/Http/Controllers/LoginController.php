<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Hash;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\facades\validator;

class LoginController extends Controller
{
    //this method will show login page customer
    public function index(){
        return view('login');
    }
    // authenticate the user 
    public function authenticate(Request $request){
        $validator=Validator::make($request->all(), [
            'email' =>'required|email',
            'password' =>'required'
        ]);

        if($validator->passes()){

        } else{
            return redirect()->route('account.login')
               ->withInput()
               ->withErrors($validator);
        }
    }

    public function dashborad(){


    }
    // this is register page
    public function register(){
       
         return view('register');
    }
    public function processregister(Request $request){
        $validator=Validator::make($request->all(), [
            'email' =>'required|email|unique:users',
            'password' =>'required|confirmed'
        ]);

        if($validator->passes()){
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->role='customer';
            $user->save();


            return redirect()->route('account.login')->with('success','you have registed successfully');


        } else{
            return redirect()->route('account.register')
               ->withInput()
               ->withErrors($validator);
        }
    }
}

