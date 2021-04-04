<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/one/{id}', [IndexController::class, 'show'])->name('show');

Route::get('/rubric/{id}', [IndexController::class, 'showRubric'])->name('showRubric');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
