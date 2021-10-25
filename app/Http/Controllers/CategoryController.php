<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    //
	public function index(){
        $categories = Category::all();
        return view('admin.content_categories', ['categories'=>$categories, 'activePage'=>'Categories','titlePage'=>'Categories']);
        }

        public function addEditCategory($category_id){
        if($category_id == 'new'){
            $category = new Category();
        }
        else{
            $category = Category::find($category_id);
        }
        $parents=array();
        $parents= Category::all();
        return view('admin.category_form', ['category'=>$category, 'parents'=>$parents,'activePage'=>'Category Management','titlePage'=>'Category Management']);
        }
	
	public function save(Request $request){
        if(empty($request->input('category_id'))){
            $e = new Category;
         }
         else{
            $e = Category::find($request->input('category_id'));
         }
        $e->category_name = $request->input('category_name');
        $e->parent = $request->input('parent');
        try{
            $e->save();
            Session::flash('alert-success', 'Category saved successfully!');
         }
         catch(\Exception $e){
            Session::flash('alert-danger', $e->getMessage());
         }
                return redirect('/admin/content_categories');
        }

	public function deleteCategory(Request $request){
                $category = \App\Models\Category::find($request->category_id);
                $children = array();
                if($category->parent == 0){
                        $children = Category::where('parent',$category->id)->get();
                        if($category->delete()){
                                foreach($children as $child){
                                        $child->delete();
                                }
                        }
                }
                else{
                        $category->delete();
                }
                Session::flash('alert-success', 'Category deleted successfully!');
                return redirect('/admin/content_categories');
        }

	public function getSubCategory($category_id){
        $categories = Category::where('parent',$category_id)
                             ->get();
        $subcategories=array();
        foreach($categories as $category){
        $subcategories[$category->id] = $category->category_name;
        }

        return json_encode($subcategories);
        }

#### 
} ## End of the Class
