<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthenticationController , UserController , BlogController , HomeController , ImageController , AdminController};

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('login' , 'AuthenticationController@loginIndex')->name('auth.login');
Route::get('register' , 'AuthenticationController@registerIndex')->name('auth.register');
Route::get('logout' , 'AuthenticationController@logout')->name('logout');
Route::get('filter/{id}' , 'BlogController@filter')->name('blog.filter');

Route::get('blog/{id}' , 'BlogController@fullstory')->name('blog.fullstory');

Route::prefix('storage')->group(function() {
    Route::get('images/{filepath}', 'ImageController@retrieveImage')->where(['filepath' => '.*'])->name('storage.image');
});

Route::post('register' , 'AuthenticationController@register')->name('register');
Route::post('login' , 'AuthenticationController@login')->name('login');


Route::group(['middleware'=>'User'],function(){
    Route::get('profile' , 'UserController@profile')->name('user.profile');
    Route::post('profile' , 'UserController@profileUpdate');
    Route::get('blog' , 'BlogController@blogIndex')->name('blog.view'); 
    Route::get('create' , 'BlogController@createIndex')->name('blog.create');
    Route::prefix('blog')->group(function() {
        Route::post('create' , 'BlogController@create');
        Route::post('delete' , 'BlogController@delete');
    });
});

Route::group(['middleware'=>'Admin'],function(){
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::prefix('admin')->group(function() {
        Route::get('user' , 'AdminController@userIndex')->name('admin.user');
        Route::post('user/delete' , 'UserController@deleteUser');
        Route::get('blog/user/{id}' , 'AdminController@userBlog')->name('user.blog');
        Route::get('blog' , 'AdminController@blog')->name('admin.blog');
        Route::post('blog/delete', 'AdminController@blogDelete')->name('blog.delete');
    });
});