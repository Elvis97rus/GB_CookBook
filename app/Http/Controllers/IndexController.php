<?php

namespace App\Http\Controllers;

use App\Models\Kitchens;
use App\Models\Recipes;
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
        $recipes = $this->wishlist->getWishlistArr($user_id);

        return view('index')->with(
            [
                'recipes' => $this->recipes->getRecipes(),
                'kitchens' => $this->kitchens->getKitchens(),
                'bestRecipes' => $this->recipes->getBestRecipes(),
                'maxLevelRecipes' => $this->recipes->getMaxLevelRecipes(),
                'rubrics' => $this->rubrics->getRubrics(),
                'wishlistArr' => $recipes
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

    public function addToWishlist(Request $request){
        Wishlist::create();
//        dd($request->get('recipe'));
    }

}
