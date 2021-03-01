<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function index(){

        $name = "alamin";
        $id = "123";

        //return view('home.index', ['name'=> 'xyz', 'id'=>12]);

        // return view('home.index')
        //         ->with('name', 'alamin')
        //         ->with('id', '12');

        // return view('home.index')
        //         ->withName($name)
        //         ->withId($id);

        return view('home.index', compact('id', 'name'));

    }

    public function create(){
        return view('home.create');

    }

    public function store(Request $req){

        //insert into DB or model...

        $userlist = $this->getUserlist();

        $newUser = ['id'=>4, 'name'=>$req['username'], 'email'=> $req['email'], 'password'=>$req['password']];

        array_push($userlist,$newUser);

        return view('home.list')->with('list', $userlist);

       // return redirect('/home/userlist');
    }

    public function edit($id){

        $user = User::find($id);

        return view('home.edit')->with('user', $user);
    }


    public function update($id, Request $req){

        //updating DB or model
        
        $user = User::find($id);

        $user->username = $req->username;
        $user->password = $req->password;
        $user->email = $req->email;
        $user->userType = $req->usertype;
        $user->save();

        return redirect('/home/userlist');
        
    }
    
    public function delete($id, Request $req){

        //updating DB or model

        if($user = User::find($id))
        {

            return view('home.delete')->with('user', $user);
        }
        else
        {
            return redirect('/home/userlist');
        }


    }
    
   
    
    public function destroy($id, Request $req){

        //updating DB or model

    
        switch($req->input)
        {
            case 'delete':
                
                if(User::destroy($id))
                {
                   
                   return redirect('/home/userlist');
                }
                else
                {
                    
                    return redirect('/home/delete/'.$id);
                }

                break;
            case 'back':
                return redirect('/home/userlist');
                break;
            default :
                return redirect('/home/userlist');
                break;

        
                

        }

        
    }

    public function userlist(){
        // db model userlist
        $userlist = $this->getUserlist();

        return view('home.list')->with('list', $userlist);
    }

    public function getUserlist (){

        $userlist = User::all();

        return $userlist;

        /*return [
                ['id'=>1, 'name'=>'alamin', 'email'=> 'alamin@aiub.edu', 'password'=>'123'],
                ['id'=>2, 'name'=>'abc', 'email'=> 'abc@aiub.edu', 'password'=>'456'],
                ['id'=>3, 'name'=>'xyz', 'email'=> 'xyz@aiub.edu', 'password'=>'789']
            ];*/
    }
}
