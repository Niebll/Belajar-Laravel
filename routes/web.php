<?php

use Illuminate\Support\Facades\Route;
use App\Models\BookOldmodel;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\Dashboard\DashboardBookController;
use App\Http\Controllers\Dashboard\DashboardPublisherController;    

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register/add-user', [RegisterController::class, 'store']);

Route::get('/about', function () {
   return view('about', ['nama' => 'Toko Buku']);
});

Route::get('/home', function () {
    return view('home');
});
Route::group(["prefix" => "/book"], function () {
    Route::get('/all', [\App\Http\Controllers\BookController::class, 'index']);
    Route::get('/detail/{book:nama}', [\App\Http\Controllers\BookController::class, 'show']);
    Route::get('/create', [\App\Http\Controllers\BookController::class, 'create']);

    Route::post('/add', [\App\Http\Controllers\BookController::class, 'store']);
    Route::delete('/delete/{book}', [\App\Http\Controllers\BookController::class, 'destroy']);

    Route::get('/edit/{book}', [\App\Http\Controllers\BookController::class, 'edit']);
    Route::post('/update/{book}', [\App\Http\Controllers\BookController::class, 'update']);
});


Route::group(["prefix" => "/publisher"], function () {
    Route::get('/all', [\App\Http\Controllers\PublisherController::class, 'index']);
    Route::get('detail/{publisher:nama}', [\App\Http\Controllers\PublisherController::class, 'show']);
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');


Route::group(["prefix" => "/dashboard"], function(){
    Route::get('/home', function () {
        return view('dashboard.index');
    })->middleware('auth');

    Route::group(["prefix" => "/book", "middleware" => "auth"], function () {
        Route::get('/all', [\App\Http\Controllers\Dashboard\DashboardBookController::class, 'index']);
        Route::get('/detail/{book:nama}', [\App\Http\Controllers\Dashboard\DashboardBookController::class, 'show']);
        Route::get('/create', [\App\Http\Controllers\Dashboard\DashboardBookController::class, 'create']);

        Route::post('/add', [\App\Http\Controllers\Dashboard\DashboardBookController::class, 'store']);
        Route::delete('/delete/{book}', [\App\Http\Controllers\Dashboard\DashboardBookController::class, 'destroy']);

        Route::get('/edit/{book}', [\App\Http\Controllers\Dashboard\DashboardBookController::class, 'edit']);
        Route::post('/update/{book}', [\App\Http\Controllers\Dashboard\DashboardBookController::class, 'update']);


       
    });

     //make route for publisher
     Route::get('/publisher/all', [\App\Http\Controllers\Dashboard\DashboardPublisherController::class, 'index']);
     Route::get('/publisher/{publisher:nama}', [\App\Http\Controllers\Dashboard\DashboardPublisherController::class, 'show']);

});