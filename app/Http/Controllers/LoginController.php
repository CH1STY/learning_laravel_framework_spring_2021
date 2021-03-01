<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('username'))
        {
            return redirect('/home');
        }
        return view('login.index');
    }

    public function verify(Request $req){

        
        $user = User::where('password',$req->password)
                    ->where('username',$req->username)
                    ->first();

        if($user!=null)
        {
            $req->session()->put('username',$user->username);
            $req->session()->put('id',$user->id);
            return redirect('/home');


        }
        else
        {
            $req->session()->flash('msg',"Login Credentials Error");
            return redirect('/login');
        }
        
        
        /*if($req->username == "" || $req->password == ""){
            echo "null submission";
        }elseif($req->username == $req->password){
            $req->session()->put('username',$req->username);
            return redirect('/home');
        }


        else{
            $req->session()->flash('msg','invalid request login first');
            return redirect('/login');
        }*/
    }
}
