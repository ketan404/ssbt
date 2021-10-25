<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Session;

class UserController extends Controller
{
	
	 public function index(){
				$data= User::all();
				
				return view('/userslist',['users'=>$data]);
	
	
		}
		
		
    public	function save(Request $req){
		
		$req->validate([
		'name'=>'required',
		'email'=>'required|email',
				]);
		if(empty($req->input('id'))){
            $data = new User;
         }
         else{
            $data = User::find($req->input('id'));
         }
		
		//$data=new Associate;
		$data->name=$req->name;
		
		$data->email=$req->email;
		$data->password=$req->password;
		
		$data->save();
				
		return redirect('admin/userslist');
	}
	
	public function edit($id){
			
			if($id == 'new'){
            $user = new User();
		   
        }
        else{
            $user = User::find($id);
        }
         return view('user-form', ['user'=>$user ]);
		
        }
		
		public function delete(Request $request){
	$user = User::find($request->id);
	  if(!empty($user)){
		if($user->delete()){
                Session::flash('alert-success', 'Person deleted successfully!');
                return redirect('/admin/userslist');
                }
	  }	
	}
		
}
