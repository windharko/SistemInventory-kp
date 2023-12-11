<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*Login fiture*/
    public function homeLogin(){//for view login page
        return view('user.login');
    }
    public function login(Request $request){//for login, searching email and password in database
        $data=$request->validate([
            'email'=>['required', 'email'],
            'password'=>['required',],
        ]);  
        $incomingFields=Validator::make($data,[
            'email'=>['required', 'email',],
            'password'=>['required'],
        ]);
        $info=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($info)){
            $user=DB::table('users')->where('email', request('email'))->first();
            $check=$user && Hash::check($request, $user->password);
            if(!$check){
                return redirect()->intended(route('home'));
            }else{
                return redirect()->back()
                ->withErrors($check)
                ->with('message', 'Please fix the following errors:');    
            }
        }else{
            return redirect()->back()
            ->withErrors($incomingFields)
            ->with('message', 'Please fix the following errors:');
        }
    }
    /*==============================*/

    /*logout fiture*/
    public function logout(){//for user logout
        Session::flush();
        Auth::logout();
        return redirect('');
    }
    /*=====================*/
}
