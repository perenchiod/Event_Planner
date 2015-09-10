<?php
	use Faker\Factory as Faker;

	class LocationSeeder extends Seeder 
	{
		public function run()
		{
			$codes = [75001,75201,78701,73344,75006,78154,75006,75078,75094,75135];
			$faker = Faker::create();
			for ($i=0; $i < 11; $i++) { 
				$location = new Location();
				$location->address = $faker->streetAddress;
				$location->city = $faker->city;
				$location->state = $faker->stateAbbr;
				$location->zip = $codes[rand(0,sizeof($codes)-1)];
				$location->save();
			}

		}
	}

?>