<?php


namespace App\Models;


class Recipes extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'name',
        'image',
        'slug',
        'description',
        'level',
        'time',
        'ingredients',
        'likes',
        'kitchen_id',
    ];

    public function getRecipes() {
        return  $recipes = Recipes::query()->paginate(6);
    }

    public function getOneRecipes($id) {
       return  $recipes = Recipes::query()->where('id', $id)->get();
    }

    public function getBestRecipes() {
        $max = Recipes::query()->get()->max('likes');
        return $recipes = Recipes::query()->where('likes', $max)->limit('1')->get();
    }

}
