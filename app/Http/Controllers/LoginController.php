<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function index(){

        return view('login.index');
    }

    public function verify(Request $req){

        
        $user = User::where('password',$req->username)
                    ->where('username',$req->username)
                    ->get();

        print_r($user);
        
        
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
