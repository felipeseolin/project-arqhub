<?php

namespace App\Models;

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
	    'user_id'
    ];
    
    protected $rules = [
        'name' => 'required',
        'area' => 'required',
        'num_bedrooms' => 'required',
        'num_bathrooms' => 'required',
        'num_floors' => 'required',
        'num_parking' => 'required',
        'num_suites' => 'required',
        'width' => 'required',
        'length' => 'required'
    ];
}
