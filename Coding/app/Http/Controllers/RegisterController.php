<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    
    /*Register fiture*/
    public function homeRegis(){//for view register page
        return view('user.register');
    }
    public function register(Request $request){//input data to database
        $data=$request->validate([
            'name'=>['required','min:3','max:200'],
            'email'=>['required', 'email'],
            'password'=>['required','min:8', 'max:25'],
        ]);
        $incomingFields=Validator::make($data,[
            'name'=>['required','min:3','max:200'],
            'email'=>['required', 'email', 'unique:users'],
            'password'=>['required','min:8', 'max:25'],
        ]);
        if($incomingFields->fails()){
            return redirect()->back()
                ->withErrors($incomingFields)
                ->with('message', 'Please fix the following errors:');}
        else{
            $data['password']=Hash::make($data['password']);
            User::create($data);
            return redirect('home');
        }
    }
    /*===============================*/
}


