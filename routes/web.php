<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cms/admin')->middleware('guest:admin,author')->group(function(){
    Route::get('{guard}/login',[UserAuthController::class ,'showLogin'])->name('login.view');
    Route::post('{guard}/login',[UserAuthController::class ,'login'])->name('login');

});
Route::prefix('cms/admin')->middleware('auth:admin,author')->group(function(){
    Route::view('/', 'cms.temp');
    Route::resource('images', ImageController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('admins', AdminController::class);
    
});