<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{
	
	protected $table = 'roles';

	public function permissions(){
		return $this->morphToMany('App\Permission','permissionable');
	}
	
}
