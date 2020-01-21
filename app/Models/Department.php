<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{	
	protected $table = 'departments';
    protected $guarded = [];
		
	public function employes(){
		return $this->hasMany('App\Models\Employe');
	}
}
