<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function users(Request $request){
		return view('admin.users');
	}
	//public function content_categories(Request $request){
	//	return view('admin.content_categories');
	//}
	public function content(Request $request){
		return view('admin.content');
	}
	public function payments(Request $request){
		return view('admin.payments');
	}
	public function reports(Request $request){
		return view('admin.reports');
	}
}
