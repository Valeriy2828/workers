<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employe extends Model
{
	protected $table = 'employes';
	
	protected $dates = ['birthday'];
	
	protected $guarded = [];
	
	public function department(){
		return $this->belongsTo('App\Models\Department');
	}
	
	public function getPaymentStringAttribute(){
        return $this->payment.' грн.';
    }
	
	public function getPaymentStrAttribute(){
		$pay=(float)$this->payment * (float)$this->hours;		
        return $pay.' грн.';
    }
}
