<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProductController;



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


/*================== Backend Admin All Routes ==============*/
Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
	Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
	Route::get('/logout',[AdminController::class, 'AminLogout'])->name('admin.logout');
});

Route::prefix('products')->group(function(){
	Route::get('/index', [ProductController::class, 'index'])->name('product.index');
	Route::get('/create', [ProductController::class, 'create'])->name('product.create');
	Route::post('/store', [ProductController::class, 'store'])->name('product.store');
	Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
	Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
	Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
	Route::get('/active/{id}', [ProductController::class, 'active'])->name('product.active');
	Route::get('/inactive/{id}', [ProductController::class, 'inactive'])->name('product.in_active');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
