<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('customer')->group(function (){
    Route::get('/', [ApiCustomerController::class, 'index']); // lay ra danh sach
    Route::post('/',  [ApiCustomerController::class, 'store']); // Thêm
    Route::get('/{id}', [ApiCustomerController::class, 'show']); // hien thi sua
    Route::put('/{id}', [ApiCustomerController::class, 'update']); // SỬa
    Route::delete('/{id}', [ApiCustomerController::class, 'destroy']); // xoa
});

