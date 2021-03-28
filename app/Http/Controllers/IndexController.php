<?php

namespace App\Http\Controllers;

use App\Models\Kitchens;
use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        //todo прокинуть рубрики, запрос where (like day), where (like week "random") написать в model
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
