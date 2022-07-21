<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// blog pages
Route::middleware(['auth','user'])->group(function(){
    Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
    Route::get('/blog/more',[BlogController::class,'more'])->name('blog.more');
    Route::get('/blog/add',[BlogController::class,'create'])->name('blog.add');
    Route::post('/blog/store',[BlogController::class,'store'])->name('blog.store');
    Route::get('/blog/fetch',[BlogController::class,'fetch'])->name('blog.fetch');
});