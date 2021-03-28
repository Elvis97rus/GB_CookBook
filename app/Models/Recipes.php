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
}
