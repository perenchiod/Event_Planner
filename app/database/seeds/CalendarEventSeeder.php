<?php
	use Faker\Factory as Faker;

	class CalendarEventSeeder extends Seeder 
	{
		public function run()
		{
			$faker = Faker::create();
			for ($i=0; $i < 8; $i++) { 
				$calendarEvent = new CalendarEvent();
				$calendarEvent->start = "2012-12-02 13:00";
				$calendarEvent->end = "2012-12-02 19:00";
				$calendarEvent->title = $faker->catchPhrase . " " . $faker->catchPhrase;
				$calendarEvent->description = $faker->realText(200, 2);
				$calendarEvent->price = rand(0,10);
				$calendarEvent->user_id = User::all()->random(1)->id;
				$calendarEvent->location_id = Location::all()->random(1)->id;
				$calendarEvent->save();
			}

		}
	}

?>