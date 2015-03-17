<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('roles',function(Blueprint $table){
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('display_name')->nullable();
			$table->timestamps();
		});

		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('role_id')->length(10)->unsigned();
			$table->string('username');
			$table->string('password',60);
			$table->string('email')->unique()->nullable();
			$table->string('name')->nullable();
			$table->date('birthdate')->nullable();
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->rememberToken();
			$table->timestamps();
			$table->foreign('role_id')->references('id')->on('roles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('roles');
	}

}
