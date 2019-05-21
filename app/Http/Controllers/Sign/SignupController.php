<?php

namespace App\Http\Controllers\Sign;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignupController extends Controller
{
	
	private $user;
	
	public function __construct (User $user) {
		$this->user = $user;
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Sign.signup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$allData = $request->all();
	    $dataForm = $request->except(['_token', 'password-confirm', 'agree']);
    	
    	$errorMessages = '';
    	if ($allData['password'] != $allData['password-confirm']) {
    		$errorMessages = 'As senhas informadas não conferem';
	    }
//    	if ($allData['agree'] != true) {
//    		$errorMessages .= 'É necessário confordar com nossas políticas para se registrar';
//	    }
    	
    	$validate = validator($dataForm, $this->user->rules, $this->user->messages);
    	
    	if (strlen($errorMessages) > 0) {
    		return redirect()->back()->withErrors($validate)->withInput();
	    }
        
        $insert = $this->user->insert($dataForm);
        
        if ($insert) {
        	return 'Cadastrado';
        } else {
        	return 'Erro ao Cadastrar';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
