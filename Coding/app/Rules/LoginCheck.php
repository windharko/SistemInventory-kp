<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginCheck implements Rule
{
    
    public function passes($attribute, $value)
    {
        $user=DB::table('users')->where('email', request('email'))->first();
        
        if($user && Hash::check($value, $user->password)){
            return true;
        }
        return false;
    }

    public function message(){
        return 'the email or the password do not match';
    }
}
