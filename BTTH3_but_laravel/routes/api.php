<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::resource('/Class',ClasssController::class)->names([
    'index'=>'Class.index',
    'show'=> 'Class.show',
    'create'=>'Class.create',
    'destroy'=> 'Class.delete',
    'edit'=> 'Class.edit',
    'store'=>'Class.store'
]);
Route::resource('/Student', StudentController::class)->names([
    'index'=> 'Student.index',
    'show'=> "Student.shows",
    'create'=>'Student.create',
    'destroy'=>'Student.delete',
    'edit'=>'Student.edit',
    'store'=>'Student.store',
]);