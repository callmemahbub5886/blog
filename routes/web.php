<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ui\Uicontroller;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();

// dashboard-start

// user-route-start

Route::get('/admin', [UserController::class, 'admin'])->name('admin');
Route::post('/admin/{id}', [UserController::class, 'update'])->name('admin.update');


// user-route-end

// blog-route-start
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/blog/create', [HomeController::class, 'blog'])->name('blog');
Route::post('/create', [BlogController::class, 'create'])->name('blog.create');
Route::put('/status/update/{id}', [BlogController::class, 'status'])->name('status');
Route::get('/blog/edit/{id}', [BlogController::class, 'blog_edit'])->name('blog_edit');
Route::post('/blog/edit/{id}', [BlogController::class, 'edit'])->name('edit.index');
Route::delete('/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
Route::put('/blog/breaking/news/{id}', [BlogController::class, 'breaking'])->name('breaking.news');
// blog-route-end


// dashboard-end

// ui-start

Route::get('/personal',[Uicontroller::class,'personal'])->name('personal.index');
Route::get('/personals',[Uicontroller::class,'personals'])->name('personals.index');
Route::get('/minimal',[Uicontroller::class,'minimal'])->name('minimal.index');
Route::get('/classic',[Uicontroller::class,'classic'])->name('classic.index');
Route::get('/category',[Uicontroller::class,'category'])->name('category.index');
Route::get('/blog',[Uicontroller::class,'blog'])->name('blog.index');
Route::get('/blogs',[Uicontroller::class,'blogs'])->name('blogs.index');
Route::get('/about',[Uicontroller::class,'about'])->name('about.index');
Route::get('/contract',[Uicontroller::class,'contract'])->name('contract.index');

// ui-end
