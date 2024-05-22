<?php

use App\Http\Controllers\blogC;
use App\Http\Controllers\userC;
use App\Http\Controllers\loginC;
use App\Http\Controllers\dashboardC;
use Illuminate\Support\Facades\Route;

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
    return view('backend.pages.dashboard');
});
Route::get('/login', [loginC::class, 'login'])->name('login');
Route::post('/act_login', [loginC::class, 'act_login'])->name('act_login');


Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [loginC::class, 'logout'])->name('logout') ;
    
    Route::get('/dashboard', [dashboardC::class, 'index'])->name('dashboard');
    Route::get('/blog_saya', [blogC::class, 'index'])->name('blog');
    Route::get('/create_blog', [blogC::class, 'create'])->name('create_blog');
    Route::post('/store_blog', [blogC::class, 'store'])->name('store_blog');
    Route::get('/show_blog/{blog}', [blogC::class, 'show'])->name('show_blog');
    Route::post('/update_blog/{blog}', [blogC::class, 'update'])->name('update_blog');
    Route::get('/destroy_blog/{blog}', [blogC::class, 'destroy'])->name('destroy_blog');
    
    Route::get('/data_user', [userC::class, 'index'])->name('data_user');
});
