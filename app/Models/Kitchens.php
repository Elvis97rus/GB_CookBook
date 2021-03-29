<?php


namespace App\Models;


class Kitchens extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function getKitchens() {
        return $kitchens = Kitchens::query()->get();
    }
}
