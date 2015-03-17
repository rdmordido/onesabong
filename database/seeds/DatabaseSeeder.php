<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('RoleTableSeeder');
		$this->call('UserTableSeeder');
	}

}

class RoleTableSeeder extends seeder {
	public function run(){		
		DB::table('users')->delete();
		DB::table('roles')->delete();
		DB::table('roles')->insert(array(
			 array('id' => 1,'name'=>'admin','display_name'=>'Administrator')
			,array('id' => 2,'name'=>'owner','display_name'=>'Owner')
			,array('id' => 3,'name'=>'guest','display_name'=>'Guest')
			,array('id' => 4,'name'=>'moderator','display_name'=>'Moderator')
			,array('id' => 5,'name'=>'sales','display_name'=>'Sales')
		));
	}
}

class UserTableSeeder extends seeder {
	public function run(){
		DB::table('users')->delete();
		DB::table('users')->insert(array(
			array(
				 'id' 		=> 1
				,'role_id' 	=> 1
				,'name' 	=> 'Administrator'
				,'username' => 'admin'
				,'password' => bcrypt('admin')
			),
			array(
				 'id' 		=> 2
				,'role_id' 	=> 2
				,'name' 	=> 'Owner'
				,'username' => 'owner'
				,'password' => bcrypt('password')
			),
			array(
				 'id' 		=> 3
				,'role_id' 	=> 3
				,'name' 	=> 'Guest'
				,'username' => 'guest'
				,'password' => bcrypt('password')
			)
		));	
		
	}
}