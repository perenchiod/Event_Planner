<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalendarEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->datetime('start');
			$table->datetime('end');
			$table->string('title');
			$table->string('description');
			$table->decimal('price',30,2)->nullable();
			
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
      		->references('id')->on('users')
      		->onDelete('cascade');
			
			$table->integer('location_id')->unsigned();
			$table->foreign('location_id')
      		->references('id')->on('location')
      		->onDelete('cascade');
			
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('calendar_events');
	}

}
