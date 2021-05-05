<?php

use App\Http\Controllers\admin\EditRubricsController;
use App\Http\Controllers\admin\ModerationRecipesController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use App\Http\Controllers\admin\IndexAdminController;
use App\Http\Controllers\admin\EditRecipesController;
use App\Http\Controllers\admin\EditUsersController;
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
Route::get('/kitchen/{id}', [IndexController::class, 'showRecipesForKitchen'])->name('showKitchen');

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

            Route::get('/addRecipeRubric/{rubric}/{recipe}', [EditRecipesController::class, 'addRecipeRubric'])->name('addRecipeRubric');
            Route::match(['get','post'],'/createRubrics', [EditRubricsController::class, 'create'])->name('createRubrics');
            Route::get('/editRubrics/', [EditRubricsController::class, 'index'])->name('editRubrics');
            Route::get('/editRubric/{rubric}', [EditRubricsController::class, 'edit'])->name('editRubric');
            Route::post('/updateRubrics/{rubric}', [EditRubricsController::class, 'update'])->name('updateRubrics');
            Route::get('/destroyRecipeRubric/{rubric}/{recipe}', [EditRubricsController::class, 'destroyRecipes'])->name('destroyRecipeRubric');
            Route::get('/destroyRubric/{rubric}', [EditRubricsController::class, 'destroy'])->name('destroyRubric');
            Route::get('/addRecipesRubric/{rubric}', [EditRubricsController::class, 'addRecipesRubric'])->name('addRecipesRubric');

            Route::match(['get','post'],'/createUser', [EditUsersController::class, 'create'])->name('createUser');
            Route::get('/editUsers/', [EditUsersController::class, 'index'])->name('editUsers');
            Route::get('/editUser/{user}', [EditUsersController::class, 'edit'])->name('editUser');
            Route::post('/updateUser/{user}', [EditUsersController::class, 'update'])->name('updateUser');
            Route::get('/destroyUser/{user}', [EditUsersController::class, 'destroy'])->name('destroyUser');

            Route::get('/moderationRecipes', [ModerationRecipesController::class, 'index'])->name('moderationRecipes');
            Route::get('/moderationRecipes/{recipe}', [ModerationRecipesController::class, 'toggleRecipe'])->name('moderationToggleRecipe');
        }
    );

Auth::routes();

//Route::get('/', [IndexAdminController::class, 'index'])->name('home');
