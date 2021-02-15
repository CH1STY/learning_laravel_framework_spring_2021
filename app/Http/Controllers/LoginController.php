<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){

        return view('login.index');
    }

    public function verify(Request $req){

        if($req->username == "" || $req->password == ""){
            echo "null submission";
        }elseif($req->username == $req->password){
            $req->session()->put('username',$req->username);
            return redirect('/home');
        }else{
            $req->session()->flash('msg','invalid request login first');
            return redirect('/login');
        }
    }
}
