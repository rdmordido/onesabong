<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model{
	
	protected $table 	= 'companies';
	protected $fillable = ['name','description'];

	public function owner(){
		return $this->belongsTo('App\User');
	}
	
}
