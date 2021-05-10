<?php


namespace App\Http\Controllers\User;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexUserController extends Controller
{
    public function edit($id_user)
    {
        if ($id_user != Auth::user()->id) {
            return redirect()->route('index')->with('success', 'Вы пытаетесь войти не в свой профиль!');
        }

        return view('user.editProfile')->with([]);
    }

    public function addRecipe($id_user)
    {
        if ($id_user != Auth::user()->id) {
            return redirect()->route('index')->with('success', 'Вы пытаетесь войти не в свой профиль!');
        }





        return view('user.addRecipe')->with([]);
    }
}
