<?php

namespace App\Http\Controllers;

use App\Models\Kitchens;
use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public $recipes;
    public $kitchens;

    /**
     * IndexController constructor.
     * @param Recipes $recipes
     * @param Kitchens $kitchens
     */
    public function __construct(Recipes $recipes, Kitchens $kitchens)
    {
        $this->recipes = new Recipes();;
        $this->kitchens = new Kitchens();;
    }


    public function index()
    {
        //todo прокинуть рубрики, запрос where (like day), where (like week "random") написать в model

        return view('index')->with(
            [
                'recipes' => $this->recipes->getRecipes(),
                'kitchens' => $this->kitchens->getKitchens(),
                'bestRecipes' => $this->recipes->getBestRecipes()[0],
                'maxLevelRecipes' => $this->recipes->getMaxLevelRecipes()[0],
            ]);
    }

    public function show($id) {

        $kitchens = Kitchens::query()->get();

        return view('OneRecipe', [
            'recipe' => $this->recipes->getOneRecipes($id),
            'kitchens' => $this->kitchens->getKitchens(),
        ]);
    }
}
