<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
	protected $table = 'project_images';
	
	protected $fillable = [
		'img_name',
		'proj_id'
	];
	
	protected $rules = [
		'img_name' => 'required',
	];
	
	public function project() {
		return $this->belongsTo(Project::class, 'proj_id', 'id');
	}
}
