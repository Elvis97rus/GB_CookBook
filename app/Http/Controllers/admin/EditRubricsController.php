<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Recipes;
use App\Models\Rubrics;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class   EditRubricsController extends Controller
{
    public function index() {

        return view('admin.rubrics.index',
            [
                'rubrics' => Rubrics::all(),
            ]);
    }

    public function edit(Rubrics $rubric) {
        return view('admin.rubrics.createRubrics', [
            'rubric' => $rubric,
            'recipes' => $this->recipes->getRubricRecipes($rubric->id),
        ]);
    }

    public function create(Request $request) {
        if ($request->isMethod('post')) {

            $url = null;

            if ($request->file('image')) {
                $path = Storage::putFile('public/rubric', $request->file('image'));
                $url = Storage::url($path);
            }

            //$this->validate($request, Recipes::rules(), [], Recipes::attributeNames());

            $rubric = new Rubrics();
            $rubric->image = $url;

            $rubric->fill($request->except('image'))->save();

            return redirect()->route('admin.editRubrics')->with('success', 'Рубрика добавлена!');
        }

        return view('admin.rubrics.createRubrics', [
            'rubric' => new Rubrics(),
        ]);
    }

    public function update(Request $request, Rubrics $rubric) {

        $url = null;

        if ($request->file('image')) {
            $segments = explode('/', $rubric->image);
            $nameFile = array_pop ($segments);

            Storage::delete("public/rubric/" . $nameFile);

            $path = Storage::putFile('public/rubric', $request->file('image'));
            $url = Storage::url($path);
            $rubric->image = $url;
        }

        //$this->validate($request, Recipes::rules(), [], Recipes::attributeNames());

        $rubric->fill($request->except('image'))->save();

        return redirect()->route('admin.editRubric', $rubric->id)->with('success', 'Рубркиа изменена!');
    }

    public function destroyRecipes(Rubrics $rubric, Recipes $recipe) {

        $recipe->rubric_id = null;

        $recipe->save();

        return back()->withInput()->with('success', 'Рецепт удален с рубрики!');
    }

    public function destroy(Rubrics $rubric) {

        $segments = explode('/', $rubric->image);
        $nameFile = array_pop ($segments);

        Storage::delete("public/rubric/" . $nameFile);

        $rubric->delete();

        return redirect()->route('admin.editRubrics')->with('success', 'Рубрика успешна удалена');
    }

    public function addRecipesRubric(Rubrics $rubric) {

        return view('admin.rubrics.addRecipesRubric',
            [
                'rubric' => $rubric,
                'recipes' => Recipes::all(),
            ]);
    }
}
