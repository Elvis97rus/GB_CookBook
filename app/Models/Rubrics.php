<?php


namespace App\Models;


class Rubrics extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function getOneRubrics($id) {

        return $rubrics = Rubrics::query()->where('id', $id)->first();
    }

    public function getRubrics() {
        return  $rubric = Rubrics::query()->get();
    }
}
