<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sms', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('uid');
			$table->string('telefon', 10);
			$table->string('mesaj', 160);
			$table->string('from', 4);
			
			$table->timestamp('sent_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sms');
	}

}
