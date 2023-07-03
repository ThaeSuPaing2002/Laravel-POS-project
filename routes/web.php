<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['admin_auth'])->group(function(){
    //admin account
    Route::group(['prefix='>'admin'],function(){
        Route::get('password/changePage',[AdminController::class,'changePwPage'])->name('admin#changePwPage');
        Route::post('password/change',[AdminController::class,'changePassword'])->name('admin#changePassword');
    });
    //after login admin
    Route::group(['prefix'=>'category','middleware'=>'admin_auth'],function(){
        Route::get('list',[CategoryController::class,'list'])->name('category#list');
        Route::get('create/page',[CategoryController::class,'createPage'])->name('category#createPage');
        Route::post('create',[CategoryController::class,'create'])->name('category#create');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category#edit');
        Route::post('update/{id}',[CategoryController::class,'update'])->name('category#update');
});
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::group(['prefix'=>'category','middleware'=>'admin_auth'],function(){
//         Route::get('list',[CategoryController::class,'list'])->name('category#list');
//         Route::get('create/page',[CategoryController::class,'createPage'])->name('category#createPage');
//         Route::post('create',[CategoryController::class,'create'])->name('category#create');
//         Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
//         Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category#edit');
//         Route::post('update/{id}',[CategoryController::class,'update'])->name('category#update');
//     });
    //after login user
    Route::group(['prefix'=>'user','middleware'=>'user_auth'],function(){
        Route::get('home',[CategoryController::class,'home'])->name('user#home');
    });
});

//real project's routes start here
Route::redirect('/', 'loginPage');
Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');
Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboardPage');



