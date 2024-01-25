<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
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
    return view('frontend/layouts/home',[
        'active' => '',
        'title' => 'The Articles'
    ]);
});

Route::get('/posts',[PostController::class, 'index']);
Route::get('/post/{post:slug}',[PostController::class, 'show']);
Route::get('/categories',[CategoryController::class, 'index']);
Route::get('/category/{category:slug}',[CategoryController::class, 'show']);
Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'authenticate']);
Route::post('/logout',[AuthController::class, 'logout']);
Route::get('/register',[AuthController::class, 'register']);
Route::post('/register',[AuthController::class, 'storeRegister']);
Route::resource('/dashboard/post', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/category', DashboardCategoryController::class)->middleware('auth');
Route::get('/dashboard/slug', [DashboardPostController::class, 'createSlug']);

Route::get('/about', function () {
    return view('frontend/layouts/about',[
        'active' => 'about',
        'title' => 'About'
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

