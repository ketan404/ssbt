<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{id}', function () {
    return view('profile');
});

Route::post('/save_profile','\App\Http\Controllers\UserProfileController@save');
Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/donation', function () {
    return view('donation');
})->name('donation');

Route::get('/privacy_policy', function () {
    return view('privacy_policy');
})->name('privacy_policy');

Route::get('/our_supporters', function () {
    return view('our_supporters');
})->name('our_supporters');

Route::get('/disclaimer', function () {
    return view('disclaimer');
})->name('disclaimer');

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/

//Profile
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard','\App\Http\Controllers\ProfileController@validateProfile')->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/account/profile/{profile_id}',[ProfileController::class,'addEditProfile'])->name('profile'); 
Route::middleware(['auth:sanctum', 'verified'])->post('/saveprofile',[ProfileController::class,'save']); 

//Admin
Route::middleware(['admin'])->group(function (){
	Route::get('/admin/users', [AdminController::class,'users'])->name('user_management');
	Route::get('/admin/content', [AdminController::class, 'content'])->name('content_management');
	Route::get('/admin/payments', [AdminController::class, 'payments'])->name('payments');
	Route::get('/admin/content_categories', [CategoryController::class, 'index'])->name('content_categories');
	Route::get('/admin/content_category_form/{category_id}', [CategoryController::class, 'addEditCategory']);
	Route::post('/admin/savecategory', [CategoryController::class, 'save']);
	Route::post('/admin/category/delete', [CategoryController::class, 'deleteCategory']);
	Route::get('/admin/reports', [AdminController::class, 'reports'])->name('reports');
});

//Route::view('/admin/user-form','user-form')->middleware('admin');
Route::post('/admin/save-user','App\Http\Controllers\UserController@save')->middleware('admin');
Route::get('/admin/userslist','App\Http\Controllers\UserController@index')->middleware('admin');
Route::post('/admin/user/delete','App\Http\Controllers\UserController@delete')->middleware('admin');
Route::get('/admin/user-form/{id}','App\Http\Controllers\UserController@edit')->middleware('admin');


// Oauth
Route::get('auth/social', 'App\Http\Controllers\Auth\LoginController@show')->name('social.login');
Route::get('oauth/{driver}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback')->name('social.callback');


Route::view('/admin/content-form','content-form')->middleware('admin');
Route::post('/admin/save-content','App\Http\Controllers\PostsController@save')->middleware('admin');
Route::get('/admin/contentlist','App\Http\Controllers\PostsController@index')->middleware('admin');
Route::post('/admin/content/delete','App\Http\Controllers\PostsController@delete')->middleware('admin');
Route::get('/admin/content-form/{id}','App\Http\Controllers\PostsController@edit')->middleware('admin');
