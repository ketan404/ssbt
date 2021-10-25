<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use DB;
use Session;

class PostsController extends Controller
{
    public function index(){
	$data= Post::all();
	return view('/contentlist',['users'=>$data]);
    }
		
    public function save(Request $request){
	$request->validate([
	'title'=>'required',
	'description'=>'required',
	'photo'=>'required',
	'video_code'=>'required',
	]);

	if(empty($request->input('id'))){
            $data = new Post;
        }
        else{
            $data = Post::find($request->input('id'));
        }
		
		#echo $request->category_id; exit;
		$data->title=$request->title;
		$data->description=$request->description;
		$data->photo=$request->photo;
		$data->video_code=$request->video_code;
		$data->save();
		$data->tag(explode(',', $request->category_id));
		if(!empty($request->input('id'))){
		$data->untag();
		}
		$data->tag($request->category_id);	
		$data->save();
		
		return redirect('admin/contentlist');
	}
	
	public function edit($id){
	if($id == 'new'){
            $content = new Post();
        }
        else{
            $content = Post::find($id);
        }
	$categories = Category::all();
        return view('content-form', ['content'=>$content, 'categories'=>$categories]);
        }
		
		public function delete(Request $request){
	$user = Post::find($request->id);
	  if(!empty($user)){
		if($user->delete()){
                Session::flash('alert-success', 'Person deleted successfully!');
                return redirect('/admin/contentlist');
                }
	  }	
	}
}
