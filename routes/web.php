<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Front\allNewsController;
use App\Http\Controllers\Front\homeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('login.view');

// Route::prefix('cms/admin')->group(function(){
//     Route::get('login',[UserAuthController::class ,'showLogin'])->name('login.view');
//     Route::post('login',[UserAuthController::class ,'login']);

// });
Route::prefix('cms')->middleware('guest:admin,author')->group(function(){
    Route::get('{guard}/login', [UserAuthController::class , 'showLogin'])->name('cms.login');
    Route::post('{guard}/login',[UserAuthController::class , 'login'])->name('login');
});

Route::prefix('cms/admin')->middleware('auth:admin,author')->group(function(){
    Route::view('/', 'cms.temp');
    Route::get('logout', [UserAuthController::class, 'logout'])->name('cms.auth.logout');

 });

Route::prefix('cms/admin')->middleware('auth:admin,author')->group(function(){

    Route::resource('images', ImageController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('role.permissions', RolePermissionController::class);

});

// Route::view('home', 'front.home')->name('home');
// Route::view('contact', 'front.contact')->name('contact');
// Route::view('all', 'front.all-news')->name('all');
// Route::view('/', 'front.home')->name('/');

// Route::view('/newsdetales', 'front.newsdetales')->name('newsdetales');


Route::group(['namespace' => 'Front'],function() {
    Route::get('/home', [homeController::class, 'index'])->name('news.home');
    Route::get('/allnews/{id}', [allNewsController::class, 'allNews'])->name('news.allnews');
    Route::get('/contact', [homeController::class , 'contact'])->name('news.contact');


  });

// Route::get('/user/{id}' , function($id){
//     return 'user id: '.$id;
// });
Route::get('/check/{name}', [homeController::class , 'check'])->middleware('check');




