<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use App\Models\Pharmacien;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect()->route('admin.users.index');
        }

        $roles = User::all();

        return view('admin.users.edit', [
            'user' => $user,
            'roles' =>$roles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->name = $request -> name;
        $user->email = $request -> email;
        $user->save();
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect()->route('admin.users.index');
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
