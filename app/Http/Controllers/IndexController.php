<?php

namespace App\Http\Controllers;

use App\Models\Kitchens;
use App\Models\Recipes;
use App\Models\Rubrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public $recipes;
    public $kitchens;
    public $rubrics;

    /**
     * IndexController constructor.
     * @param Recipes $recipes
     * @param Kitchens $kitchens
     * @param Rubrics $rubrics
     */
    public function __construct(Recipes $recipes, Kitchens $kitchens, Rubrics $rubrics)
    {
        $this->recipes = new Recipes();
        $this->kitchens = new Kitchens();
        $this->rubrics = new Rubrics();
    }

    public function index()
    {
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
        return view('oneRubric', [
            'recipe' => $this->recipes->getRubricRecipes($rubric_id),
            'kitchens' => $this->kitchens->getKitchens(),
            'rubric' => $this->rubrics->getOneRubrics($rubric_id),
        ]);
    }
}
