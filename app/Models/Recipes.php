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
        $maxLikes = Recipes::query()->get()->max('likes');
        return $recipes = Recipes::query()->where('likes', $maxLikes)->limit('1')->get();
    }

    public function getMaxLevelRecipes() {
        $maxLevel = Recipes::query()->get()->max('level');
        $maxLevelLikes = Recipes::query()->where('level',  $maxLevel)->get()->max('likes');
        return $recipes = Recipes::query()->where('likes', $maxLevelLikes)->limit('1')->get();
    }

}
