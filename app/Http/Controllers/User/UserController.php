<?php

namespace App\Http\Controllers\User;

use App\Mail\SendMail;
use App\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //

    public function edit()
    {
        $title = "Editar Usuário";
        $user = Auth::user();

        return view('user.edit', compact('title', 'user'));
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

        return view('user.edit', compact('title', 'user', 'update'));
    }

    public function show($id)
    {
        $user = new User();
        $user = $user->find($id);

        if (!$user) {
            return abort(404);
        }

        $title = $user->name;

        $projects = Project::where("user_id", '=', $id)->get();

        return view('user.user', compact('user', 'projects', 'title'));
    }

    public function sendEmail(Request $request, $id)
    {
        $user = new User();
        $user = $user->find($id);
        if (!$user) {
            return abort(404);
        }
        $title = $user->name;

        $dataForm = $request->all();
        Mail::to($user->email)->send(new SendMail($dataForm));

        $msg = 'E-mail enviado';
        $response = true;

        if (count(Mail::failures()) > 0) {
            $response = false;
            $msg = 'Ocorreu um ou mais erros e o email nao foi enviado';
        }


        return view('user.info', compact('user', 'title', 'msg', 'response'));
    }
}
