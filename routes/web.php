<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::get('/about', function () {
    return 'about';
});
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->middleware('admin')->name('products.create');
Route::post('products', [ProductController::class, 'store'])->middleware('admin')->name('products.store');
// Route::get('products/{product:id}/edit', [ProductController::class, 'edit'])->middleware('admin')->name('products.edit');
// Route::put('products/{product:id}', [ProductController::class, 'update'])->middleware('admin')->name('products.update');
// Route::delete('products/{product:id}', [ProductController::class, 'destroy'])->middleware('admin')->name('products.destroy');
Auth::routes();

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('google')->name('google.')->group(function () {
    Route::get('/login', [GoogleController::class, 'LoginWithGoogle'])->name('login');
    Route::any('/callback', [GoogleController::class, 'CallbackFromGoogle'])->name('callback');
});
