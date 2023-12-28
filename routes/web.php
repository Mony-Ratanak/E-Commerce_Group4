<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;
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
// routes/web.php

Route::get('/', [WelcomeController::class, 'welcome']);


Route::resource("/products","App\Http\Controllers\ProductController");

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{categoryId}', [CategoryController::class, 'show']);
Route::patch('/categories/{categoryId}', [CategoryController::class, 'update']);
Route::delete('/categories/{categoryId}', [CategoryController::class, 'destroy']);
Route::get('/categories/{categoryId}/products', [CategoryController::class, 'getProducts']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{productId}', [ProductController::class, 'show']);
Route::patch('/products/{productId}', [ProductController::class, 'update']);
Route::delete('/products/{productId}', [ProductController::class, 'destroy']);