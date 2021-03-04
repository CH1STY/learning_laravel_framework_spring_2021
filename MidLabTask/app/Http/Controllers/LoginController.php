<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\Admin;
use App\Accountant;
use App\Customer;
use App\Vendor;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->session()->has('username'))
        {
            return redirect()->route('dashboard');
        }
        
        
        return view('login.index');
    }


    public function verify(loginRequest $request)
    {
        if($user = Admin::where('email',$request->email)
                ->where('password',$request->password)
                ->first())
        {
            $request->session()->put('username',$user->username);
            $request->session()->put('usertype','admin');

            return redirect()->route('dashboard');
        }
        elseif($user = Accountant::where('email',$request->email)
        ->where('password',$request->password)
        ->first())
        {

            $request->session()->put('username',$user->username);
            $request->session()->put('usertype','accountant');

            return redirect()->route('dashboard');
        }
        elseif($user = Customer::where('email',$request->email)
        ->where('password',$request->password)
        ->first())
        {

            $request->session()->put('username',$user->username);
            $request->session()->put('usertype','customer');

            return redirect()->route('dashboard');
        }
        elseif($user = Vendor::where('email',$request->email)
        ->where('password',$request->password)
        ->first())
        {

            $request->session()->put('username',$user->username);
            $request->session()->put('usertype','vendor');

            return redirect()->route('dashboard');
        }
        else
        {
            $request->session()->flash('errorMsg','Invalid Credentials');

            return Back();
        }
       
        
    }
}
