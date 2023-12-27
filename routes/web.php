<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return Auth::check() ? redirect('/home') : redirect('/login');
});
  
// admin panels
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/admin_index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth', 'isAdmin');
    Route::get('/user_manage', [App\Http\Controllers\AdminController::class, 'manage'])->name('admin.manage');
    Route::delete('/users/{id}/delete', [App\Http\Controllers\AdminController::class, 'destroyUser'])->name('admin.destroyUser');
}); 

Route::resource('posts', PostController::class)->middleware('auth');
Route::resource('products', ProductController::class);
Route::post('/products/{product}/save', [App\Http\Controllers\ProductController::class, 'saveProduct'])->name('products.save');
Route::get('/saved-products', [App\Http\Controllers\UserController::class, 'savedProducts'])->name('user.savedProducts');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
