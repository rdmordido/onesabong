<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table 	= 'users';
	protected $appends 	= array('is_admin');
	protected $hidden 	= ['password', 'remember_token'];

	public function getIsAdminAttribute(){
		return ($this->role_id == 1) ? true : false;
	}

	public function account(){
		return $this->hasOne('\App\Account');
	}
	
	public function role(){
		return $this->belongsTo('\App\Role');
	}
	
	public function history(){
		return $this->morphMany('\App\History','historable');
	}

}
