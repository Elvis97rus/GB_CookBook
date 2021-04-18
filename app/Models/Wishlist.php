<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','recipe_id'];

    public static function create(){
        $recipe_id = (int)$_GET['recipe'];
        $user_id = Auth::user()->id;

        $recipes_rec = Wishlist::query()
            ->where('recipe_id', $recipe_id)
            ->where('user_id', $user_id)
            ->first();

        if ($recipes_rec) {
            Wishlist::query()
                ->where('id', $recipes_rec->id)
                ->delete();
        } else {
            $wishlist = new Wishlist();
            $wishlist->recipe_id = $recipe_id;
            $wishlist->user_id = $user_id;
            $wishlist->save();
        }
    }

    public function getWishlistArr($user_id = 0){
        $arr = [];
        foreach ($this->getRecipesList($user_id) as $record){
            array_push($arr, $record->recipe_id );
        }
        return $arr;
    }

    public function getRecipesList($user_id = 0){
        $recipes_ids = Wishlist::query()
            ->select('recipe_id')
            ->where('user_id', $user_id)
            ->get();

        return $recipes_ids;
    }

    public function getRecipes($user_id) {
        $recipes = Recipes::query()
            ->whereIn('id', $this->getRecipesList($user_id))
            ->get();

        return $recipes;
    }
}
