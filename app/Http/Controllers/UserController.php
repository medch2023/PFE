<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function assignRoleToUser()
    {
        $user = User::find(1);
        $role = Role::where('name', 'admin')->first();
        $user->roles()->attach($role);

        // Autres actions ou redirections selon vos besoins
    }

    public function getUsersWithRole()
    {
        $role = Role::where('name', 'admin')->first();
        $users = $role->users()->get();

        // Faites quelque chose avec la collection d'utilisateurs récupérée

        return view('users.index', ['users' => $users]);
    }
}
