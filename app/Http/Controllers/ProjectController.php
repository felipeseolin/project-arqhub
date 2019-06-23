<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller {
	private $project;
	private $totalByPages = 15;
	
	
	public function __construct (Project $project) {
		$this->project = $project;
	}
	
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function listar() {
		$projects = Project::all();
		$param1 = null;
		$param2 = null;
		$param3 = null;
		$param4 = null;
		return view("project.index", compact('projects','param1', 'param2', 'param3', 'param4'));
	}

	public function oneParam($param1, $value1) {
		$projects = Project::where([[$param1, '=', $value1]])->get();
		$param2 = null;
		$param3 = null;
		$param4 = null;
		return view("project.index", compact('projects','param1', 'param2', 'param3', 'param4'));
	}

	public function twoParam($param1, $value1, $param2, $value2) {
		$projects = Project::where([[$param1, '=', $value1], [$param2, '=', $value2]])->get();
		$param3 = null;
		$param4 = null;
		return view("project.index", compact('projects','param1', 'param2', 'param3', 'param4'));
	}

	public function threeParam($param1, $value1, $param2, $value2, $param3, $value3) {
		$projects = Project::where([[$param1, '=', $value1], [$param2, '=', $value2], [$param3, '=', $value3]])->get();
		$param4 = null;
		return view("project.index", compact('projects','param1', 'param2', 'param3', 'param4'));
	}

	public function fourParam($param1, $value1, $param2, $value2, $param3, $value3, $param4, $value4) {
		$projects = Project::where([[$param1, '=', $value1], [$param2, '=', $value2], [$param3, '=', $value3], [$param4, '=', $value4]])->get();
		return view("project.index", compact('projects','param1', 'param2', 'param3', 'param4'));
	}

	public function detalhes ($id) {
		$project = $this->project->find($id);
		return view("project.show")->with('project', $project );
	}

	public function index () {
		$title = "Projetos";
		
		$projects = $this->project->paginate($this->totalByPages);
		
		foreach ($projects as $project) {
			$project->canEdit = Auth::user()->id == $project->user_id;
		}
		
		$userName = Auth::user()->name;
		
		return view("project.list", compact('projects', 'title', 'userName'));
	}
	
	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create () {
		$title = "Novo projeto";
		$categories = ['tradicional', 'edicula', 'praia', 'campo'];
		
		return view("project.create", compact('title', 'categories'));
	}
	
	/**
	 * Store a newly created resource in storage.
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store (Request $request) {
		$dataForm = $request->except(['_token']);
		// Adiciona o id do usuário autenticado como autor no projeto
		$dataForm["user_id"] = Auth::user()->id;
		// Insere no banco de dados
		$insert = $this->project->insert($dataForm);
		
		return redirect()->route("project.index");
	}
	
	/**
	 * Display the specified resource.
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show ($id) {
		$project = $this->project->find($id);
		$user = new User();
		$userName = $user->find($project->user_id)->name;
		$userEmail = $user->find($project->user_id)->email;
		
		$title = "Projeto " . $project->name;

		return view("project.show", compact('project', 'title', 'userName', "userEmail"));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit ($id) {
		$project = $this->project->find($id);
		$title = $project->name;
		$categories = ['tradicional', 'edicula', 'praia', 'campo'];
		
		return view("project.edit", compact('title', 'project', 'categories'));
	}
	
	/**
	 * Update the specified resource in storage.
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update (Request $request, $id) {
		$dataForm = $request->except(['_token']);
		$project = $this->project->find($id);
		
		$update = $project->update($dataForm);
		
		return redirect()->route("project.index");
	}
	
	/**
	 * Remove the specified resource from storage.
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy ($id) {
		$project = $this->project->find($id);
		
		$delete = $project->delete();
		
		if ($delete) {
			return redirect()->route('project.index');
		} else {
			return redirect()->route('project.show', $id)->withErrors('Falha ao deletar');
		}
	}
}
