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
	public function index () {
		$title = "Projetos";
		
		$projects = $this->project->paginate($this->totalByPages);
		
		foreach ($projects as $project) {
			$project->canEdit = Auth::user()->id == $project->id;
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
		
		return view("project.create", compact('title'));
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
		
		$title = "Projetos";
		return view("project.list", compact('title'));
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
		
		$title = "Projeto " . $project->name;
		
		return view("project.show", compact('project', 'title', 'userName'));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit ($id) {
		$project = $this->project->find($id);
		$title = $project->name;
		
		return view("project.edit", compact('title', 'project'));
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
		
		$msg = $update ? "Projeto atualizado com sucesso" : "Não foi possível atualizar o projeto";
		
		return view("project.edit", compact('title', 'project', 'msg', 'update'));
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
