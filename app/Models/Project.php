<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
    	'name',
	    'description',
	    'area',
	    'num_bedrooms',
	    'num_bathrooms',
	    'num_floors',
	    'num_parking',
	    'num_suites',
	    'width',
	    'length',
	    'category',
        'cover',
        'humanized_plant',
	    'user_id'
    ];

    public $rules = [
        'name' => 'required|min:5|max:250',
        'description' => 'min:5|max:500',
        'area' => 'required|numeric|min:0',
        'num_bedrooms' => 'required|numeric|min:0',
        'num_bathrooms' => 'required|numeric|min:0',
        'num_floors' => 'required|numeric|min:0',
        'num_parking' => 'required|numeric|min:0',
        'num_suites' => 'required|numeric|min:0',
        'width' => 'required|numeric|min:0',
        'length' => 'required|numeric|min:0',
        'category' => 'required'
    ];

    public $messages = [
        'name.required' => 'O campo nome é de preenchimento obrigatório.',
        'name.min' => 'O campo nome deve conter ao menos 5 caracteres.',
        'name.max' => 'O campo nome deve possui até 250 caracteres.',
        'description.min' => 'O campo descrição deve conter ao menos 5 caracteres.',
        'description.max' => 'O campo descrição deve possui até 500 caracteres.',
        'area.required' => 'O campo área é de preenchimento obrigatório.',
        'area.numeric' => 'O campo área deve ser composto apenas por números.',
        'area.min' => 'O campo área deve possuir um número maior que zero.',
        'num_bedrooms.required' => 'O campo quantidade de quartos é de preenchimento obrigatório.',
        'num_bedrooms.numeric' => 'O campo quantidade de quartos deve ser composto apenas por números.',
        'num_bedrooms.min' => 'O campo quantidade de quartos deve possuir um número maior que zero.',
        'num_bathrooms.required' => 'O campo quantidade de banheiros é de preenchimento obrigatório.',
        'num_bathrooms.numeric' => 'O campo quantidade de banheiros deve ser composto apenas por números.',
        'num_bathrooms.min' => 'O campo quantidade de banheiros deve possuir um número maior que zero.',
        'num_floors.required' => 'O campo quantidade de andares é de preenchimento obrigatório.',
        'num_floors.numeric' => 'O campo quantidade de andares deve ser composto apenas por números.',
        'num_floors.min' => 'O campo quantidade de andares deve possuir um número maior que zero.',
        'num_parking.required' => 'O campo quantidade de vagas de estacionamento é de preenchimento obrigatório.',
        'num_parking.numeric' => 'O campo quantidade de vagas de estacionamento deve ser composto apenas por números.',
        'num_parking.min' => 'O campo quantidade de vagas deve possuir um número maior que zero.',
        'num_suites.required' => 'O campo quantidade de suites é de preenchimento obrigatório.',
        'num_suites.numeric' => 'O campo quantidade de suites deve ser composto apenas por números.',
        'num_suites.min' => 'O campo quantidade de suites deve possuir um número maior que zero.',
        'width.required' => 'O campo largura é de preenchimento obrigatório.',
        'width.numeric' => 'O campo largura deve ser composto apenas por números.',
        'width.min' => 'O campo largura deve deve possuir um número maior que zero.',
        'length.numeric' => 'O campo comprimento deve ser composto apenas por números.',
        'length.min' => 'O campo comprimento deve possuir um número maior que zero.',
        'length.required' => 'O campo comprimento é de preenchimento obrigatório.',
        'category.required' => 'O campo categoria é de preenchimento obrigatório.'
    ];

    const CATEGORIES = [
        'tradicional' => 'Tradicional',
        'edicula' => 'Edícula',
        'praia' => 'Praia',
        'campo' => 'Campo'
    ];

    public function project_image() {
    	return $this->hasMany(ProjectImage::class, 'proj_id', 'id');
    }

	public function user() {
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
