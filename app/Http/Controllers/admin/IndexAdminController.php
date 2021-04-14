<?php


namespace App\Http\Controllers\admin;


class IndexAdminController extends \Illuminate\Routing\Controller
{
    public function index()
    {
        echo "Админка";
die();
        return view('index')->with(
            [
                'recipes' => $this->recipes->getRecipes(),
                'kitchens' => $this->kitchens->getKitchens(),
                'bestRecipes' => $this->recipes->getBestRecipes(),
                'maxLevelRecipes' => $this->recipes->getMaxLevelRecipes(),
                'rubrics' => $this->rubrics->getRubrics(),
            ]);
    }
}
