<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipesController extends Controller
{
    public function getRecipes() {
        $recipes = DB::table('recipes')->select('*')->paginate(10);
        return view('index', compact('recipes'));
    }
}
