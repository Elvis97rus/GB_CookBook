<?php

namespace App\Http\Controllers;

use App\Models\Kitchens;
use App\Models\Recipes;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public $recipes;
    public $kitchens;
    public $services;

    /**
    * IndexController constructor.
    * @param Recipes $recipes
    * @param Kitchens $kitchens
    * @param Services $services
    */
    public function __construct(Recipes $recipes, Kitchens $kitchens, Services $services)
    {
        $this->recipes = new Recipes();;
        $this->kitchens = new Kitchens();;
        $this->services = new Services();;
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

    public function sort() {
        $data = [
            'kitchen_id' => $this->services->getFromURI('kitchen-type'),
            'level' => $this->services->getFromURI('difficulty'),
            'time' => $this->services->getFromURI('volume'),
            'ingredients' => $this->services->getFromURI('ingredients'),
        ];

        return view('SortRecipes')->with(
            [
                'data' => $this->recipes->sort($data),
            ]);
    }
}
