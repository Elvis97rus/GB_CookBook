<?php

namespace App\Http\Controllers;

use App\Models\Kitchens;
use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rubrics;
use App\Models\Services;

class IndexController extends Controller
{
    public $recipes;
    public $kitchens;
    public $services;
    public $rubrics;

    /**
    * IndexAdminController constructor.
    * @param Recipes $recipes
    * @param Kitchens $kitchens
    * @param Services $services
    * @param Rubrics $rubrics
    */
    public function __construct(Recipes $recipes, Kitchens $kitchens, Services $services, Rubrics $rubrics)
    {
        $this->recipes = new Recipes();
        $this->kitchens = new Kitchens();
        $this->services = new Services();
        $this->rubrics = new Rubrics();
    }


    public function index()
    {
        //todo прокинуть рубрики, запрос where (like day), where (like week "random") написать в model

        return view('index')->with(
            [
                'recipes' => $this->recipes->getRecipes(),
                'kitchens' => $this->kitchens->getKitchens(),
                'bestRecipes' => $this->recipes->getBestRecipes(),
                'maxLevelRecipes' => $this->recipes->getMaxLevelRecipes(),
                'rubrics' => $this->rubrics->getRubrics(),
            ]);
    }

    public function show($id) {

        $kitchens = Kitchens::query()->get();

        return view('OneRecipe', [
            'recipe' => $this->recipes->getOneRecipes($id),
            'kitchens' => $this->kitchens->getKitchens(),
        ]);
    }

    public function showRubric($rubric_id) {
        return view('OneRubric', [
            'recipe' => $this->recipes->getRubricRecipes($rubric_id),
            'kitchens' => $this->kitchens->getKitchens(),
            'rubric' => $this->rubrics->getOneRubrics($rubric_id),
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
                'kitchens' => $this->kitchens->getKitchens(),
            ]);
    }

}
