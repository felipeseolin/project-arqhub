<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function edit()
    {
        $title = "Editar Usuário";
        $user = Auth::user();

        return view("user.edit", compact('title', 'user'));
    }

    public function update(Request $request)
    {
	    $title = "Editar Usuário";
        // Recupera o item para editar
        $user = new User();
        $user = $user->find(Auth::user()->id);
        
        $update = $user->update($request->all());
        //Desativar o usuário
        if ($request->input('active')) {
            return 'Seu usuário foi desativado';
        }
	
	    return view("user.edit", compact('title', 'user', 'update'));
    }
}
