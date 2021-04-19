<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use App\Http\Controllers\admin\IndexAdminController;
use App\Http\Controllers\admin\EditRecipesController;
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

Route::get('/wishlist', [IndexController::class, 'goToWishlist'])->name('wishlist');
Route::get('/wishlist/add', [IndexController::class, 'addToWishlist'])->name('wishlistAdd');

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->middleware(['is_admin', 'auth'])
    ->group(
        function () {
            Route::get('/', [IndexAdminController::class, 'index'])->name('index');
            Route::match(['get','post'],'/createRecipes', [EditRecipesController::class, 'create'])->name('createRecipes');
            Route::get('/editRecipes/', [EditRecipesController::class, 'index'])->name('editRecipes');
            Route::get('/editRecipe/{recipe}', [EditRecipesController::class, 'edit'])->name('editRecipe');
            Route::post('/updateRecipes/{recipe}', [EditRecipesController::class, 'update'])->name('updateRecipes');
            Route::get('/destroyRecipes/{recipe}', [EditRecipesController::class, 'destroy'])->name('destroyRecipes');
        }
    );

Auth::routes();

//Route::get('/', [IndexAdminController::class, 'index'])->name('home');
