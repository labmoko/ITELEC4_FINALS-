<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});
  
// admin panels
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/user_manage', [App\Http\Controllers\AdminController::class, 'manage'])->name('admin.manage');
    Route::delete('/users/{id}/delete', [App\Http\Controllers\AdminController::class, 'destroyUser'])->name('admin.destroyUser');
}); 


Route::resource('products', ProductController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
