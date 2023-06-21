<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
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
    return view('home');
});

Route::get('/add', [ProductController::class, 'create'])->name('product.add');
Route::post('/add/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/list', [ProductController::class, 'list'])->name('product.list');
Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/admin/panel', [AdminController::class, 'show'])->name('admin.panel');
Route::post('/admin/delete', [AdminController::class, 'delete'])->name('user.delete');
Route::post('/product/delete', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/gen', [ProductController::class, 'generatePrices']);
require __DIR__.'/auth.php';
