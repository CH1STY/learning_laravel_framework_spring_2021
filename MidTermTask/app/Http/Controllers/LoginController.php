<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\User;

class LoginController extends Controller
{
    //
    public function index()
    {

        return view('login.index');
    }

    public function verify(loginRequest $request)
    {
        $user = User::where('email',$request->email)
                ->where('password',$request->password)
                ->first();
        if($user!=null)
        {
            $request->session()->put('username',$user->username);
            $request->session()->put('usertype',$user->userType);

            return redirect()->route('user');

            
        }
        else
        {
            $request->session()->flash('errorMsg','User Not Found');
            return Back();
            
        }
        
    }
}
