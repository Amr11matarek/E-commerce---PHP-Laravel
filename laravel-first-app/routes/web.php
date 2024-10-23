<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\shopController;

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



Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);



Route::post('/logut', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard',[homeController::class,'dashboard'])->middleware('isAdmin')->name('admin.dashboard');


Route::get('/', [homeController::class, 'index'])-> name('auth.home');

Route::get('/categories',[categoriesController::class,'index'])-> name('categories.index');
Route::get('/categories/creat',[categoriesController::class,'creat'])-> name('categories.creat');
Route::post('/categories',[categoriesController::class,'store'])-> name('categories.store');

Route::delete('/categories/{category}',[categoriesController::class,'destroy'])->name('categories.destroy');

Route::get('/categories/{category}/edit', [categoriesController::class, 'edit'])->name('categories.edit');

Route::put('/categories/{category}', [categoriesController::class, 'update'])->name('categories.update');

Route::get('/products',[productsController::class,'index'])-> name('products.index');
Route::post('/products',[productsController::class,'store'])-> name('products.store');
Route::get('/products/creat',[productsController::class,'creat'])-> name('products.creat');
Route::delete('/products/{product}',[productsController::class,'destroy'])->name('products.destroy');
Route::get('/products/{product}/edit', [productsController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [productsController::class, 'update'])->name('products.update');

Route::get('/shop',[shopController::class,'index'])-> name('auth.shop');
Route::get('/products/search', [shopController::class, 'search'])->name('products.search');
Route::get('/products/{product}', [shopController::class, 'show'])->name('products.show');

Route::get('/userCategory',[shopController::class,'getCategory'])-> name('auth.userCategory');
Route::get('/userCategory/{category}/products',[shopController::class,'getProductsByCategoryProducts'])-> name('auth.categoryProducts');
