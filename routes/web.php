<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransactionController;



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
// Route::get('transactions', [TransactionController::class,'index']);
// Route::delete('delete/{id}', [TransactionController::class,'destroy']);
// Route::get('edit/{id}', [TransactionController::class,'show']);
// Route::put('update/{id}', [TransactionController::class,'update']);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
