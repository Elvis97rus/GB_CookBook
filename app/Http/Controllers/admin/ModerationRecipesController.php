<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Recipes;

class ModerationRecipesController extends Controller
{
    public function index() {
        return view('admin.recipes.moderationRecipes',
            [
                'recipes' => Recipes::all()
            ]);
    }

    public function toggleRecipe(Recipes $recipe) {

        if ($recipe->is_true) {
            $recipe->is_true = !$recipe->is_true;
            $recipe->save();
            return redirect()->route('admin.moderationRecipes')->with('success', 'Рецепт запрещен');
        } else {
            $recipe->is_true = true;
            $recipe->save();
            return redirect()->route('admin.moderationRecipes')->with('success', 'Рецепт разрешен');
        }
    }
}
