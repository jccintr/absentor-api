<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();
        return response()->json($users->values()->all(),200);
    }

    public function show($id)
    {
        $users = User::find($id);

        if ($users){
            return response()->json($users,200);
        } else {
            return response()->json(['erro'=>'Usuário não encontrado.'],404);
        }
    }
}
