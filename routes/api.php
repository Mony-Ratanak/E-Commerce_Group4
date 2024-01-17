<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AuthController;

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


// Route::get('/categories', [Controller::class, 'getCategory'], function() {
//     return "Get all categories";
// });
// Route::post('/categories', function (Request $request) {
//     return "Create 1 category";
// });
// Route::get('/categories/{categoryId}', function (Request $request) {
//     return "Get 1 category by categoryID";

// });
// Route::patch('/categories/{categoryId}', function (Request $request) {
//     return "Update 1 category";
// });

// Route::delete('/categories/{categoryId}', function (Request $request) {
//     return "Delete 1 category";
// });


Route::get('/getproductbycategory', [ProductController::class, 'getproductbycategory']);
Route::get('/getproductbyid', [ProductController::class, 'getproductbyid']);
Route::get('/getallproducts', [ProductController::class, 'getallproducts']);
Route::get('/getproductbycategoryandbrand', [ProductController::class, 'getproductbycategoryandbrand']);
Route::get('/getallproductsbybrand', [ProductController::class, 'getallproductsbybrand']);
Route::get('/getbrandid', [BrandController::class, 'getbrandid']);


Route::delete('/products/{product_id}', [ProductController::class, 'deleteProduct']);

Route::patch('/products/{product_id}', [ProductController::class, 'updateProduct']);

Route::post('/createProduct', [ProductController::class, 'createProduct']);
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::post('/login', [AuthController::class, 'login']);

// Verify OTP
Route::post('/verify_otp', [AuthController::class, 'verifyOTP']);
// Route::get('/products/{productId}', function (Request $request) {
//     return "Get 1 product";

// });
// Route::patch('/products/{productId}', function (Request $request) {
//     return "Update 1 product";
// });

// Route::delete('/products/{productId}', function (Request $request) {
//     return "Delete 1 product";
// });

// Route::get('/categories/{categoryId/products}', function (Request $request) {
//     return "Get all products belong to categoryId";
// });

