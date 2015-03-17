<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model{
	
	protected $table 	= 'accounts';
	protected $fillable = ['name','display_name','description'];

	public function owner(){
		return $this->belongsTo('App\User');
	}
	
}
