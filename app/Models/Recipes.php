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
        return $recipes = Recipes::query()->where('likes', $maxLikes)->limit('1')->first();
    }

    public function getMaxLevelRecipes() {
        $maxLevel = Recipes::query()->get()->max('level');
        $maxLevelLikes = Recipes::query()->where('level',  $maxLevel)->get()->max('likes');
        return $recipes = Recipes::query()->where('likes', $maxLevelLikes)->limit('1')->first();
    }

    public function getRubricRecipes($rubric_id) {
        return  $recipes = Recipes::query()->where('rubric_id', $rubric_id)->get();
    }

    public function sort($data) {
        $dataForQuery = [];

        foreach ($data as $key => $value) {
            if (strlen($value) == 0 || !$value) {
                unset($data[$key]);
            } else {
                switch($key) {
                    case 'kitchen_id':
                        array_push($dataForQuery, ['kitchen_id', '=', $value]);
                        break;
                    case 'level':
                        array_push($dataForQuery, ['level', '<=', $value]);
                        break;
                    case 'time':
                        array_push($dataForQuery, ['time', '<=', $value]);
                        break;
                    case 'ingredients':
                        array_push($dataForQuery, ['ingredients', 'like', "%{$value}%"]);
                        break;
                }
            }
        }

        $result = Recipes::query()
                    ->where($dataForQuery)
                    ->get();

        return $result;
    }

}
