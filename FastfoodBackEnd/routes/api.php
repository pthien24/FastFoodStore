<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\MembersController;

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
// Route::get('students', [StudentController::class, 'index']);
// Route::post('students', [StudentController::class, 'store']);
// Route::get('students/{id}', [StudentController::class, 'show']);
// Route::get('students/{id}/edit', [StudentController::class, 'edit']);
// Route::put('students/{id}/edit', [StudentController::class, 'update']);
// Route::delete('students/{id}/delete', [StudentController::class, 'destroy']);

Route::get('category', [CategoryController::class, 'index']);
Route::post('category', [CategoryController::class, 'store']);
Route::get('category/{id}', [CategoryController::class, 'show']);
Route::get('category/{id}/edit', [CategoryController::class, 'edit']);
Route::put('category/{id}/edit', [CategoryController::class, 'update']);
Route::delete('category/{id}/delete', [CategoryController::class, 'destroy']);


Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::get('products/{id}/edit', [ProductController::class, 'edit']);
Route::put('products/{id}/edit', [ProductController::class, 'update']);
Route::delete('products/{id}/delete', [ProductController::class, 'destroy']);


Route::get('login', function () {
    $response = ['errorCode'=> 401,'message'=> 'Unauthencated'];
    return response()->json($response, 401);
})->name('login');



Route::post('/login', [UsersController::class,'login']);


Route::post('/member/register', [MembersController::class, 'register']);
Route::post('/member/login', [MembersController::class, 'login']);


Route::group(['prefix' => 'member' , 'middleware' => 'auth:sanctum'], function () {
    Route::get('/profile', [MembersController::class , 'profile']);
});
