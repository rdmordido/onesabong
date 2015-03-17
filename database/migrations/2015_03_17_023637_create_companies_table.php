<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->string('name')->unique();
		    $table->string('description')->nullable();
		    $table->string('logo')->nullable();
		    $table->string('cover')->nullable();
		    $table->string('facebook')->nullable();
		    $table->string('twitter')->nullable();
		    $table->integer('user_id')->length(10)->unsigned();
		    $table->timestamps();
		    $table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('companies');
	}

}
