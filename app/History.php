<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model {

	protected $table = 'history';
	protected $fillable = array('event');

	public function historable(){
		return $this->morphTo();
	}

}
