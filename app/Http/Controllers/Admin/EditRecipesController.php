<?php

namespace App\Http\Controllers\Admin;

use App\Models\Recipes;
use App\Models\Rubrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class EditRecipesController extends Controller
{
    public function index() {

        return view('admin.recipes.editRecipes',
            [
                'recipes' => Recipes::all()
            ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

            $url = null;

            if ($request->file('image')) {
                $path = Storage::putFile('public/recipes', $request->file('image'));
                $url = Storage::url($path);
            }

            //$this->validate($request, Recipes::rules(), [], Recipes::attributeNames());

            $recipe = new Recipes();
            $recipe->image = $url;

            $recipe->fill($request->except('image'))->save();

            return redirect()->route('admin.editRecipes')->with('success', 'Рецепт добавлен!');
        }

        return view('admin.recipes.createRecipes', [
            'recipe' => new Recipes(),
            'kitchens' => $this->kitchens->getKitchens(),
        ]);
    }

    public function edit(Recipes $recipe) {
        return view('admin.recipes.createRecipes', [
            'recipe' => $recipe,
            'kitchens' => $this->kitchens->getKitchens(),
        ]);
    }

    public function update(Request $request, Recipes $recipe) {

        $url = null;

        if ($request->file('image')) {
            $segments = explode('/', $recipe->image);
            $nameFile = array_pop ($segments);

            Storage::delete("public/recipes/" . $nameFile);

            $path = Storage::putFile('public/recipes', $request->file('image'));
            $url = Storage::url($path);
            $recipe->image = $url;
        }

        //$this->validate($request, Recipes::rules(), [], Recipes::attributeNames());

        $recipe->fill($request->except('image'))->save();

        return back()->withInput()->with('success', 'Рецепт изменен!');
    }

    public function destroy(Recipes $recipe) {

        $segments = explode('/', $recipe->image);
        $nameFile = array_pop ($segments);

        Storage::delete("public/recipes/" . $nameFile);

        $recipe->delete();

        return back()->withInput()->with('success', 'Рецепт успешно удален');
    }

    public function addRecipeRubric(Rubrics $rubric, Recipes $recipe) {

        $recipe->rubric_id = $rubric->id;

        $recipe->save();

        return back()->withInput()->with('success', 'Рецепт успешно добавлен в рубкрику');
    }
}
