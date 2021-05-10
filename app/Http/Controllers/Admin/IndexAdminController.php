<?php


namespace App\Http\Controllers\Admin;


use App\Models\Recipes;
use App\Http\Controllers\Controller;

class IndexAdminController extends Controller
{
    public function index()
    {
        return view('admin.index')->with([]);
    }
}
