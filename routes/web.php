<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
// Home Page
Route::get('/',[HomeController::class,'home']);
Route::get('/detail/{id}', [HomeController::class, 'detail']);
Route::get('/all-categories', [HomeController::class, 'all_category']);
// Admin Route
Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login', [AdminController::class, 'submit_login']);

Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::get('/admin/dashboard', [CategoryController::class, 'dashboard']);
// Categories
Route::get('admin/category/{id}/delete',[CategoryController::class,'destroy']);
Route::resource('admin/category',CategoryController::class);
// Route::post('admin/category',[ CategoryController::class,'edit']);



// POSTS
Route::get('admin/post/{id}/delete', [PostController::class, 'destroy']);
Route::resource('admin/post', PostController::class);
// user Route
Route::get('/post', [UserController::class, 'index']);
// categories Post
Route::get('/category_post/{id}', [HomeController::class, 'category']);



