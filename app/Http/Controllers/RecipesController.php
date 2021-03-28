<?php

namespace App\Http\Controllers;

use App\Models\Kitchens;
use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipesController extends Controller
{
    public function getRecipes()
    {

        $recipes = Recipes::query()->paginate(6);

        $kitchens = Kitchens::query()->get();

        return view('index')->with(
            [
                'recipes' => $recipes,
                'kitchens' => $kitchens,
            ]);
    }

    public function show($id) {

        $recipe = Recipes::query()->where('id', $id)->get();

        $kitchens = Kitchens::query()->get();

        return view('OneRecipe', [
            'recipe' => $recipe,
            'kitchens' => $kitchens,
        ]);
    }
}
