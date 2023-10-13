<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasssController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::resource('/Class',ClasssController::class)->names([
    'index'=>'Class.index',
    'show'=> 'Class.show',
    'create'=>'Class.create',
    'destroy'=> 'Class.destroy',
    'edit'=> 'Class.edit',
    'store'=>'Class.store'
]);

Route::resource('/Student', StudentController::class)->names([
    'index'=> 'Student.index',
    'show'=> "Student.shows",
    'create'=>'Student.create',
    'destroy'=>'Student.destroy',
    'edit'=>'Student.edit',
    'store'=>'Student.store',
]);
