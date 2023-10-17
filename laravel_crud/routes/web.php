<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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
Route::get("/", [HomeController::class, 'index'])->name('home');
Route::resource('/Book', BookController::class)->names([
    'index' => 'Book.index',
    'show' => 'Book.show',
    'edit' => 'Book.edit',
    'update' => 'Book.update',
    'destroy' => 'Book.destroy'
]);
Route::resource('/Author', AuthorController::class)->names([
    'index' => 'Author.index',
    'show' => 'Author.show',
    'edit' => 'Author.edit',
    'update' => 'Author.update',
    'destroy' => 'Author.destroy'
]);
