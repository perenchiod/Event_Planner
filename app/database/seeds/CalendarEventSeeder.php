<?php
	use Faker\Factory as Faker;

	class CalendarEventSeeder extends Seeder 
	{
		public function run()
		{
			$faker = Faker::create();
			for ($i=0; $i < 8; $i++) { 
				$calendarEvent = new CalendarEvent();
				$calendarEvent->start = "2011-02-27 20:52:14";
				$calendarEvent->end = "2011-02-27 24:52:14";
				$calendarEvent->title = $faker->catchPhrase . " " . $faker->catchPhrase;
				$calendarEvent->description = $faker->realText(200, 2);
				$calendarEvent->price = rand(0,10);
				$calendarEvent->user_id = floor(rand(0,11));
				$calendarEvent->location_id = floor(rand(0,11));
				$calendarEvent->save();
			}

		}
	}

?>