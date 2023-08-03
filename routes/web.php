<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\GenerateSlugController;

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
    return view('home', [
        'page_active' => 'home',
        'title_page' => 'home'
    ]);
});

Route::get('/dashboard', function () {
    return view('admin.dashboard', [
        'page_active' => 'dashboard',
        'title_page' => 'dashboard'
    ]);
});

Route::get('/about', function () {
    $user = User::findOrFail(1);
    return view('about', [
        'page_active' => 'about',
        'title_page' => 'about',
        'user' => $user,
        'image' => 'me.jpg'
    ]);
});

// blog
Route::get('/blogs', [BlogController::class, 'index'])->middleware('auth');
Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->middleware('auth');
Route::get('/blogs/category/{category:slug}', [BlogController::class, 'show_category'])->middleware('auth');
Route::get('/blogs/author/{author:slug}', [BlogController::class, 'show_author'])->middleware('auth');

// blog admin
Route::resource('/admin/blogs', AdminBlogController::class, ['except' => ['blogs.show', 'blogs.edit', 'blogs.destroy', 'blogs.update']])->middleware('auth');
Route::controller(AdminBlogController::class)->group(function () {
    Route::get('/admin/blogs/{blog:slug}', 'show')->middleware('auth');
    Route::get('/admin/blogs/edit/{blog:slug}', 'edit')->middleware('auth');
    Route::put('/admin/blogs/{blog:slug}', 'update')->middleware('auth');
    Route::delete('/admin/blogs/{blog:slug}', 'destroy')->middleware('auth');
});

// category
Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth');

// auth
Route::get('/signin', [AuthController::class, 'signin'])->middleware('guest');
Route::get('/signup', [AuthController::class, 'signup'])->middleware('guest');
Route::post('/signin', [AuthController::class, 'signinPost']);
Route::post('/signup', [AuthController::class, 'signupPost']);
Route::post('/signout', [AuthController::class, 'signout'])->middleware('auth');

// slug
Route::get('/generateSlug', [GenerateSlugController::class, 'generateSlug'])->middleware('auth');

Route::controller(CategoryController::class)->group(function () {
    Route::get('/admin/categories', 'adminIndex')->middleware('auth');
    Route::get('/admin/categories/{category:slug}', 'show');
    Route::post('/admin/categories', 'store');
});
