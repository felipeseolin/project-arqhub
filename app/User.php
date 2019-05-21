<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'birth', 'email', 'phone', 'password', 'bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public $rules = [
	    'fname' => 'required|min:3|max:250',
	    'lname' => 'required|min:5|max:250',
	    'birth' => 'required',
	    'email' => 'required',
	    'bio' => 'required',
    ];
    
    public $messages = [
    	'fname.required' => 'O campo nome é de preenchimento obrigatório',
    	'lname.required' => 'O campo sobrenome é de preenchimento obrigatório',
    	'birth.required' => 'O campo data de nascimento é de preenchimento obrigatório',
    	'email.required' => 'O campo email é de preenchimento obrigatório',
    	'password.required' => 'O campo senha é de preenchimento obrigatório',
    	'phone.numeric' => 'O campo telefone deve ser preenchido com apenas números',
    ];
}
