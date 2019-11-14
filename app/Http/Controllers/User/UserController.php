<?php

namespace App\Http\Controllers\User;

use App\Mail\SendMail;
use App\Models\ProjectImage;
use App\User;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    private $totalByPages = 10;

    public function edit()
    {
        $title = "Editar Usuário";
        $user = Auth::user();

        return view('user.edit', compact('title', 'user'));
    }

    public function disable()
    {
        return view('user.disable');
    }

    public function update(Request $request)
    {
        // Desativar o usuário
        if (filter_var($request->all()['active'], FILTER_VALIDATE_BOOLEAN) == false) {
            // Salva no banco
            $user = new User();
            $user = $user->find(Auth::user()->id);
            $user->update(array('active' => false));
            // Desloga o usuário
            return redirect('login')->with(Auth::logout());
        }
        $title = "Editar Usuário";
        $name = null;
        // Trata a imagem
        $img = $request->file('picture');
        if ($img) {
            $this->validate($request,
                [
                    'picture' => 'image|mimes:jpeg,png,jpg|max:2048'
                ]);
            $name = time() . '-' . md5($img->getClientOriginalName()) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images/users'), $name);
        }
        // Recupera o item para editar
        $user = new User();
        $user = $user->find(Auth::user()->id);
        $imgAntiga = $user->picture;

        $update = $user->update($request->all());
        // Atualiza a foto
        if ($update && $img) {
            $update = $user->update(array('picture' => $name));
            $imgPath = public_path('images/users/') . $imgAntiga;
            if (File::exists($imgPath)) {
                File::delete($imgPath);
            }
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


        $projects = Project::with('project_image')->where("user_id", '=', $id)->get();

        $projectsImgs = DB::table('project_images')->join('projects', 'projects.id', '=', 'project_images.proj_id')
            ->where('user_id', '=', $id)->take(5)->get();

        return view('user.user', compact('user', 'projects', 'title', 'projectsImgs'));
    }

    public function sendEmail(Request $request, $id)
    {
        $user = new User();
        $user = $user->find($id);
        if (!$user) {
            return abort(404);
        }

        $dataForm = $request->all();
        $dataForm['email-to'] = $user->email;

        Mail::to($user->email)->send(new SendMail($dataForm));

        $mailStatus = 'E-mail enviado';
        if (count(Mail::failures()) > 0) {
            $mailStatus = 'Ocorreu um ou mais erros e o email nao foi enviado';
        }

        return redirect($request->path())->with('mailStatus', $mailStatus);
    }

    public function listar()
    {
        $title = "Projetistas";
        $users = User::with('project')->paginate($this->totalByPages);
        return view("user.list", compact('users', 'title'));
    }

}
