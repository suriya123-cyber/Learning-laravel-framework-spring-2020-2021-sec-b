<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller


{
    public function index( Request $req){

        $name = "abc";
        $id = "123";

        //return view('home.index', ['name'=> 'xyz', 'id'=>12]);

        // return view('home.index')
        //         ->with('name', 'alamin')
        //         ->with('id', '12');

        // return view('home.index')
        //         ->withName($name)
        //         ->withId($id);

        if($req->session()->has('username')){
            return view('home.index', compact('id', 'name'));
        }else{
            $req->session()->flash('msg', 'invalid request...login first!');
            return redirect('/login');
        }

    }

    public function create(){
        return view('home.create');
    }

    public function store(Request $req){

        //insert into DB or model...
        echo $req->username;

        //return view('home.list')->with('list', $userlist);
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

  
        return redirect('/home/userlist');
    }

    public function userlist(){
        // db model userlist
        $userlist = $this->getUserlist();

        return view('home.list')->with('list', $userlist);
    }

    public function getUserlist (){

        return [
                ['id'=>1, 'name'=>'abc', 'email'=> 'abc@gmail.com', 'password'=>'123'],
              
            ];
    }
}


