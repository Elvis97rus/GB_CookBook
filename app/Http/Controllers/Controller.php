<?php

namespace App\Http\Controllers;

use App\Models\Kitchens;
use App\Models\Recipes;
use App\Models\Rubrics;
use App\Models\Services;
use App\Models\Wishlist;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $recipes;
    public $kitchens;
    public $services;
    public $rubrics;
    public $wishlist;

    /**
     * IndexAdminController constructor.
     * @param Recipes $recipes
     * @param Kitchens $kitchens
     * @param Services $services
     * @param Rubrics $rubrics
     * @param Wishlist $wishlist
     */
    public function __construct(Recipes $recipes, Kitchens $kitchens, Services $services, Rubrics $rubrics, Wishlist $wishlist)
    {
        $this->recipes = new Recipes();
        $this->kitchens = new Kitchens();
        $this->services = new Services();
        $this->rubrics = new Rubrics();
        $this->wishlist = new Wishlist();
    }
}
