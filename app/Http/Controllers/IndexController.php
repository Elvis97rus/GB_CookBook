<?php

namespace App\Http\Controllers;

use App\Models\Kitchens;
use App\Models\Recipes;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Rubrics;
use App\Models\Services;

class IndexController extends Controller
{

    public function index()
    {
        //todo прокинуть рубрики, запрос where (like day), where (like week "random") написать в model
        $user_id = 0;
        if (Auth::user()) {
            $user_id = Auth::user()->id;
        }

        return view('index')->with(
            [
                'users' => User::query()->get(),
                'recipes' => $this->recipes->getRecipes(),
                'kitchens' => $this->kitchens->getKitchens(),
                'bestRecipes' => $this->recipes->getBestRecipes(),
                'maxLevelRecipes' => $this->recipes->getMaxLevelRecipes(),
                'rubrics' => $this->rubrics->getRubrics(),
                'wishlistArr' => $this->wishlist->getWishlistArr($user_id)
            ]);
    }

    public function show($id) {
        $user_id = 0;
        if (Auth::user()) {
            $user_id = Auth::user()->id;
        }

        return view('oneRecipe', [
            'recipe' => $this->recipes->getOneRecipes($id),
            'kitchens' => $this->kitchens->getKitchens(),
            'wishlistArr' => $this->wishlist->getWishlistArr($user_id)
        ]);
    }

    public function showRubric($rubric_id) {
        return view('oneRubric', [
            'recipe' => $this->recipes->getRubricRecipes($rubric_id),
            'kitchens' => $this->kitchens->getKitchens(),
            'rubric' => $this->rubrics->getOneRubrics($rubric_id),
        ]);
    }

    public function sort() {
        $user_id = 0;
        if (Auth::user()) {
            $user_id = Auth::user()->id;
        }

        $data = [
            'kitchen_id' => $this->services->getFromURI('kitchen-type'),
            'level' => $this->services->getFromURI('difficulty'),
            'time' => $this->services->getFromURI('volume'),
            'ingredients' => $this->services->getFromURI('ingredients'),
        ];

        return view('sortRecipes')->with(
            [
                'data' => $this->recipes->sort($data),
                'kitchens' => $this->kitchens->getKitchens(),
                'wishlistArr' => $this->wishlist->getWishlistArr($user_id)
            ]);
    }

    public function goToWishlist(){
        if (Auth::user()) {
            $recipes = $this->wishlist->getRecipes(Auth::user()->id);
            $recipes_ids = $this->wishlist->getWishlistArr(Auth::user()->id);
        }else {
            return redirect()->route('login');
        }

        return view('wishlist')->with(
            [
                'data' => $recipes,
                'kitchens' => $this->kitchens->getKitchens(),
                'wishlistArr' => $recipes_ids
            ]);
    }

    public function addToWishlist(){
        Wishlist::create();
    }

    public function showRecipesForKitchen($kitchen_id) {

        return view('recipesForKitchen', [
                'kitchens' => $this->kitchens->getKitchens(),
                'recipes' => $this->recipes->getRecipesForKitchen($kitchen_id),
            ]
        );

    }

}
