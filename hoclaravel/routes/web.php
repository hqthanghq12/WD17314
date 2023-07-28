<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CustomerController;
use \App\Http\Controllers\Auth\LoginCotroller;

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
    return view('welcome');
});
Route::match(['GET', 'POST'], '/login', [LoginCotroller::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function (){
Route::get('/list-customer',[CustomerController::class, 'list_customer'])->name('list');
Route::post('/list-customer',[CustomerController::class, 'list_customer'])->name('search-customer');
Route::match(['GET', 'POST'], '/add/customer', [CustomerController::class, 'add'])->name('add-customer');
Route::match(['GET', 'POST'], '/edit/customer/{id}', [CustomerController::class, 'edit'])->name('edit-customer');
Route::get('/delete/customer/{id}',[CustomerController::class, 'delete'])->name('delete-customer');
});
