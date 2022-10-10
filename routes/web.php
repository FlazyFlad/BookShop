<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('books', BookController::class);

Route::get('books/byvendor/{vendor}', [BookController::class, 'bookByVendor'])->name('
booksByVendor');

Route::group(['prefix' => 'auth'], function () {
   Route::get('register', [AuthController::class, 'register'])->name('register');
   Route::get('login', [AuthController::class, 'auth'])->name('auth');
   Route::post('user/create', [AuthController::class, 'create'])->name('user.create');
   Route::post('signin', [AuthController::class, 'login'])->name('login');
   Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});

//require __DIR__.'/auth.php';
