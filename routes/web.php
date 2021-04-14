<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use App\Http\Controllers\admin\IndexAdminController;
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

Route::get('/sort', [IndexController::class, 'sort'])->name('sort');

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->middleware(['is_admin', 'auth'])
    ->group(
        function () {
            Route::get('/', [IndexAdminController::class, 'index'])->name('index');
            //Route::match(['get','post'],'/create', [RecipesEditController::class, 'create'])->name('create');
        }
    );

Auth::routes();

//Route::get('/', [IndexAdminController::class, 'index'])->name('home');
