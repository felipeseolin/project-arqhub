<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    private $project;
    private $totalByPages = 15;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $title = "Projetos";
        $activeUser = true;
        $projects = Project::whereHas('user', function ($query) use ($activeUser){
                $query->where('active', $activeUser);
            })
            ->paginate($this->totalByPages);
        $param1 = null;
        $param2 = null;
        $param3 = null;
        $param4 = null;
        return view("project.index", compact('projects', 'param1', 'param2', 'param3', 'param4', 'title'));
    }

    public function oneParam($param1, $value1)
    {
        $title = "Projetos";
        $activeUser = true;
        $projects = Project::where([[$param1, '=', $value1]])
            ->whereHas('user', function ($query) use ($activeUser){
                $query->where('active', $activeUser);
            })
            ->paginate($this->totalByPages);
        $param2 = null;
        $param3 = null;
        $param4 = null;
        return view("project.index", compact('projects', 'param1', 'param2', 'param3', 'param4', 'title'));
    }

    public function twoParam($param1, $value1, $param2, $value2)
    {
        $title = "Projetos";
        $activeUser = true;
        $projects = Project::where([[$param1, '=', $value1], [$param2, '=', $value2]])
            ->whereHas('user', function ($query) use ($activeUser){
                $query->where('active', $activeUser);
            })
            ->paginate($this->totalByPages);
        $param3 = null;
        $param4 = null;
        return view("project.index", compact('projects', 'param1', 'param2', 'param3', 'param4', 'title'));
    }

    public function threeParam($param1, $value1, $param2, $value2, $param3, $value3)
    {
        $title = "Projetos";
        $activeUser = true;
        $projects = Project::where([
                [$param1, '=', $value1],
                [$param2, '=', $value2],
                [$param3, '=', $value3]
            ])
            ->whereHas('user', function ($query) use ($activeUser){
                $query->where('active', $activeUser);
            })
            ->paginate($this->totalByPages);
        $param4 = null;
        return view("project.index", compact('projects', 'param1', 'param2', 'param3', 'param4', 'title'));
    }

    public function fourParam($param1, $value1, $param2, $value2, $param3, $value3, $param4, $value4)
    {
        $title = "Projetos";
        $activeUser = true;
        $projects = Project::where([
                [$param1, '=', $value1],
                [$param2, '=', $value2],
                [$param3, '=', $value3],
                [$param4, '=', $value4]
            ])
            ->whereHas('user', function ($query) use ($activeUser){
                $query->where('active', $activeUser);
            })
            ->paginate($this->totalByPages);
        return view("project.index", compact('projects', 'param1', 'param2', 'param3', 'param4', 'title'));
    }

    public function detalhes($id)
    {
        $project = $this->project->find($id);
        return view("project.show")->with('project', $project);
    }

    public function index()
    {
        $title = "Meus Projetos";

        $projects = $this->project->where('user_id', '=', Auth::user()->id)->paginate($this->totalByPages);

        return view("project.list", compact('projects', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Novo projeto";
        $categories = ['tradicional', 'edicula', 'praia', 'campo'];

        return view("project.create", compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->except(['_token', 'images', 'images.*']);
        // Adiciona o id do usuário autenticado como autor no projeto
        $dataForm["user_id"] = Auth::user()->id;
        // Valida os dados da requisição
        $this->validate($request, $this->project->rules, $this->project->messages);
        // Valida imagens
        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'cover' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'humanized_plant' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ], [
            'images.required' => 'É obrigatório anexar ao menos uma imagem para o projeto.',
            'images.image' => 'O arquivo inserido deve ser uma imagem.',
            'images.mimes' => 'O arquivo deve seguir ser do formado png, jpg, jpeg ou svg.',
            'images.max' => 'A imagem deve ter no máxio 2048 KB',
            'cover.required' => 'É obrigatório inserir uma imagem para a capa',
            'cover.image' => 'O arquivo de capa do projeto deve ser uma imagem',
            'cover.mimes' => 'O arquivo deve seguir ser do formado png, jpg, jpeg ou svg',
            'cover.max' => 'A imagem de capa deve ter no máxio 2048 KB',
            'humanized_plant.required' => 'É obrigatório inserir uma imagem para a planta humanizada',
            'humanized_plant.image' => 'O arquivo de planta humanizada deve ser uma imagem',
            'humanized_plant.mimes' => 'O arquivo deve seguir ser do formado png, jpg, jpeg ou svg',
            'humanized_plant.max' => 'A imagem de planta humanizada deve ter no máxio 2048 KB'
        ]);
        // Salva a capa do projeto
        if ($coverImage = $request->file('cover')) {
            $coverImageName = time() . '.' . md5($coverImage->getClientOriginalName()) . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('images'), $coverImageName);
        }
        // Salva a planta humanizada
        if ($humanizedPlant = $request->file('humanized_plant')) {
            $humanizedPlantName = time() . '.' . md5($humanizedPlant->getClientOriginalName()) . '.' . $humanizedPlant->getClientOriginalExtension();
            $humanizedPlant->move(public_path('images'), $humanizedPlantName);
        }
        // Insere os dados de projeto no banco de dados
        $project = new Project();
        $project->name = $dataForm['name'];
        $project->description = $dataForm['description'];
        $project->area = $dataForm['area'];
        $project->num_bedrooms = $dataForm['num_bedrooms'];
        $project->num_bathrooms = $dataForm['num_bathrooms'];
        $project->num_floors = $dataForm['num_floors'];
        $project->num_parking = $dataForm['num_parking'];
        $project->num_suites = $dataForm['num_suites'];
        $project->width = $dataForm['width'];
        $project->length = $dataForm['length'];
        $project->category = $dataForm['category'];
        $project->cover = $coverImageName;
        $project->humanized_plant = $humanizedPlantName;
        $project->user_id = Auth::user()->id;
        $project->save();

        // Salva as imagens
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = time() . '.' . md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $name);
                // Insere no banco as imagens;
                $projectImages = new ProjectImage();
                $projectImages->proj_id = $project->id;
                $projectImages->img_name = $name;
                $projectImages->save();
            }
        }

        return redirect()->route("project.index");
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = $this->project->find($id);
        $images = ProjectImage::where('proj_id', '=', $project->id)->get();
        $user = new User();
        $userName = $user->find($project->user_id)->name;
        $userEmail = $user->find($project->user_id)->email;

        $title = "Projeto " . $project->name;
        return view("project.show", compact('project', 'title', 'userName', "userEmail", "images"));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = $this->project->find($id);
        $title = $project->name;

        if (Auth::user()->id != $project->user_id) {
            return abort(404);
        }

        $categories = ['tradicional', 'edicula', 'praia', 'campo'];

        return view("project.edit", compact('title', 'project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->except(['_token']);
        $project = $this->project->find($id);
        // Valida os dados da requisição
        $this->validate($request, $this->project->rules, $this->project->messages);
        // Valida imagens
        $this->validate($request, [
            'images' => '',
            'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'cover' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'humanized_plant' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ], [
            'images.image' => 'O arquivo inserido deve ser uma imagem.',
            'images.mimes' => 'O arquivo deve seguir ser do formado png, jpg, jpeg ou svg.',
            'images.max' => 'A imagem deve ter no máxio 2048 KB',
            'cover.image' => 'O arquivo de capa do projeto deve ser uma imagem',
            'cover.mimes' => 'O arquivo deve seguir ser do formado png, jpg, jpeg ou svg',
            'cover.max' => 'A imagem de capa deve ter no máxio 2048 KB',
            'humanized_plant.image' => 'O arquivo de planta humanizada deve ser uma imagem',
            'humanized_plant.mimes' => 'O arquivo deve seguir ser do formado png, jpg, jpeg ou svg',
            'humanized_plant.max' => 'A imagem de planta humanizada deve ter no máxio 2048 KB'
        ]);

        // Verifica se há uma nova capa para o projeto
        if ($coverImage = $request->file('cover')) {
            // Exclui a antiga imagem
            $imgPath = public_path('images/') . $project->cover;
            if (File::exists($imgPath)) {
                File::delete($imgPath);
            }
            // Salva a nova imagem
            $coverImageName = time() . '.' . md5($coverImage->getClientOriginalName()) . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('images'), $coverImageName);
            $dataForm['cover'] = $coverImageName;
        }
        // Verifica se há uma nova planta humanizada para o projeto
        if ($humanizedPlant = $request->file('humanized_plant')) {
            // Exclui a antiga imagem
            $imgPath = public_path('images/') . $project->humanized_plant;
            if (File::exists($imgPath)) {
                File::delete($imgPath);
            }
            // Salva a nova imagem
            $humanizedPlantName = time() . '.' . md5($humanizedPlant->getClientOriginalName()) . '.' . $humanizedPlant->getClientOriginalExtension();
            $humanizedPlant->move(public_path('images'), $humanizedPlantName);
            $dataForm['humanized_plant'] = $humanizedPlantName;
        }

        // Atualiza o projeto
        $update = $project->update($dataForm);

        // Se houverem novas imagens
        if ($files = $request->file('images')) {
            // Exclui as imagens antigas
            $images = ProjectImage::where('proj_id', '=', $project->id)->get();
            foreach ($images as $img) {
                // Exclui do sistema de arquivos
                $imgPath = public_path('images/') . $img->img_name;
                if (File::exists($imgPath)) {
                    File::delete($imgPath);
                }
                // Exclui do banco
                $img->delete();
            }
            // Salva as novas imagens
            foreach ($files as $file) {
                $name = time() . '.' . md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $name);
                // Insere no banco as imagens;
                $projectImages = new ProjectImage();
                $projectImages->proj_id = $project->id;
                $projectImages->img_name = $name;
                $projectImages->save();
            }
        }

        return redirect()->route("project.index");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Encontra o projeto
        $project = $this->project->find($id);
        // Encontra as imagens do projeto
        $projectImages = new ProjectImage();
        $projectImages = $projectImages->where('proj_id', $project->id)->get();
        foreach ($projectImages as $projectImage) {
            // Apaga o arquivo
            $path = public_path(). '\images\\' . $projectImage->img_name;
            unlink($path);
            // Apaga a instancia no banco
            $projectImage->delete();
        }
        // Apaga o projeto
        $delete = $project->delete();
        if ($delete) {
            return redirect()->route('project.index');
        } else {
            return redirect()->route('project.show', $id)->withErrors('Falha ao deletar');
        }
    }
}
