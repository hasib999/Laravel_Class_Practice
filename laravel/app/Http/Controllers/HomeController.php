<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    function index(){

    	/*$data  = ['id'=>'1233', 'name'=>'alamin'];
    	return view('home.index', $data);*/

    	/*return view('home.index')
    			->with('name', 'alamin')
    			->with('id', '1233');*/

    	/*return view('home.index')
    			->withName('alamin')
    			->withId('1233');*/

    	/*$v = view('home.index');
    	$v->withName('alamin');
    	$v->withId('1234');
    	return $v;*/

    	$users = $this->getStudentList();
		return view('home.index')->with('users', $users);
    }
    function edit($id){

		$users = $this->getStudentList();
		$user= $users[$this->search($users,'id',$id)];
		return view('home.edit')->with('user',$user);

    }

    function update($id, Request $request){

    	$newUser = ['id'=>$id, 'name'=>$request->name,'email'=>$request->email, 'password'=>$request->password];

    	$users = $this->getStudentList();
		
		$key=$this->search($users,'id',$id);
		$users[$key]=$newUser;

    	return view('home.index')->with('users', $users);

    }

    function delete($id){

    	$users = $this->getStudentList();
    	$user=$users[$this->search($users,'id',$id)];
    	return view('home.delete')->with('user', $user);

    }

    function destroy($id, Request $request){
    	
    	$users = $this->getStudentList();
		$key=$this->search($users,'id',$id);
		unset($users[$key]);
		
    	return view('home.index')->with('users', $users);
	}
	function details($id)
	{
		$users=$this->getStudentList();
		$user=$users[$this->search($users,'id',$id)];
		return view('home.details')->with('user',$user);
	}


    function getStudentList(){
    	return  [
	    			['id'=>'1', 'name'=>'alamin','email'=>'abc@gmail.com', 'password'=>'123'],
	    			['id'=>'2', 'name'=>'abc','email'=>'abc@aiub.com', 'password'=>'456'],
	    			['id'=>'3', 'name'=>'xyz','email'=>'xyz@gmail.com', 'password'=>'789']
				];
	}
	function search($array,$field,$search)
	{
		foreach($array as $key => $value)
		{
			if($value[$field]===$search)
			{
				return $key;
			}
		}
		return false;
	}
}
