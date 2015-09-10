<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();


		DB::table('calendar_events')->delete();
     	DB::table('users')->delete();
     	DB::table('location')->delete();
 
		$this->call('UserSeeder');
		$this->call('LocationSeeder');
		$this->call('CalendarEventSeeder');
	}

}
