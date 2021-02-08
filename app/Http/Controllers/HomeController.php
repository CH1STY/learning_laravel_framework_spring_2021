<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $userlist= $this->getUserlist();
        $user = [];

        foreach($userlist as $u){
            if($u['id'] == $id ){
                $user = $u;
                break;
            }
        }


        return view('home.edit')->with('user', $user);
    }


    public function update($id, Request $req){

        //updating DB or model
        $count = 0;
        $userlist = $this->getUserlist();
        foreach($userlist as $u){
            if($u['id'] == $id ){
                break;
            }
            $count+=1;
        }

        $userlist[$count]['name'] = $req['username'];
        $userlist[$count]['password'] = $req['password'];
        $userlist[$count]['email'] = $req['email'];

        return view('home.list')->with('list', $userlist);
        
    }
    
    public function delete($id, Request $req){

        //updating DB or model
        return view('home.delete')->with('id', $id);
    }
    
   
    
    public function destroy($id, Request $req){

        //updating DB or model

        $count = 0;
        $userlist = $this->getUserlist();
        foreach($userlist as $u){
            if($u['id'] == $id ){
                break;
            }
            $count+=1;
        }
        unset($userlist[$count]);

        return view('home.list')->with('list', $userlist);
        
    }

    public function userlist(){
        // db model userlist
        $userlist = $this->getUserlist();

        return view('home.list')->with('list', $userlist);
    }

    public function getUserlist (){

        return [
                ['id'=>1, 'name'=>'alamin', 'email'=> 'alamin@aiub.edu', 'password'=>'123'],
                ['id'=>2, 'name'=>'abc', 'email'=> 'abc@aiub.edu', 'password'=>'456'],
                ['id'=>3, 'name'=>'xyz', 'email'=> 'xyz@aiub.edu', 'password'=>'789']
            ];
    }
}
