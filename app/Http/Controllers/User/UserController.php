<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function edit()
    {
        $title = "Editar Usuario";
        $user = Auth::user();

        return view("user.edit", compact('title', 'user'));
    }

    public function update()
    {
        dd('Deucerto');
    }
}
