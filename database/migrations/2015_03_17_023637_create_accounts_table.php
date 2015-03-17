<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->string('name')->unique();
		    $table->string('display_name')->nullable();
		    $table->string('description')->nullable();
		    $table->string('logo')->nullable();
		    $table->string('cover')->nullable();
		    $table->string('facebook')->nullable();
		    $table->string('twitter')->nullable();
		    $table->integer('user_id')->length(10)->unsigned();
		    $table->timestamps();
		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}
