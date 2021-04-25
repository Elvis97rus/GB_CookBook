<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EditUsersController extends Controller
{
    public function index() {

        return view('admin.users.index',
            [
                'users' => User::all()
            ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

            // $url = null;

            // if ($request->file('foto')) {
            //     $path = Storage::putFile('public/users', $request->file('foto'));
            //     $url = Storage::url($path);
            // }

            $user = new User();
            $data = $request->except('foto');
            // $user->image = $url;

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_admin' => $data['is_admin']
            ]);

            return redirect()->route('admin.editUsers')->with('success', 'Пользователь создан.');
        }

        return view('admin.users.create', [
            'user' => new User()
        ]);
    }

    public function edit(User $user) {
        return view('admin.users.create', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user) {

        // $url = null;

        // if ($request->file('foto')) {
        //     $segments = explode('/', $user->image);
        //     $nameFile = array_pop ($segments);

        //     Storage::delete("public/users/" . $nameFile);

        //     $path = Storage::putFile('public/recipes', $request->file('image'));
        //     $url = Storage::url($path);
        //     $user->foto = $url;
        // }

        $data = $request->except('foto');
        $data['password'] = Hash::make($data['password']);
        $user->fill($data)->save();

        return back()->withInput()->with('success', 'Пользователь изменен.');
    }

    public function destroy(User $user) {

        // $segments = explode('/', $user->foto);
        // $nameFile = array_pop ($segments);

        // Storage::delete("public/users/" . $nameFile);

        $user->delete();

        return back()->withInput()->with('success', 'Пользователь успешно удалён.');
    }
}
