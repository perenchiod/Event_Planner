<?php
	use Faker\Factory as Faker;

	class UserSeeder extends Seeder 
	{
		public function run()
		{
			$this->envUser();
			$this->fakeUser();
		}
		
		protected function envUser()
		{
			$user = new User();
			$user->first_name = $_ENV['USER_FIRST_NAME'];
			$user->last_name = $_ENV['USER_LAST_NAME'];
			$user->email = $_ENV['USER_EMAIL'];
			$user->username = $_ENV['USER_USERNAME'];
			$user->password = $_ENV['USER_PASSWORD'];
			$user->save();
		}

		protected function fakeUser()
		{
			$faker = Faker::create();
			for($i=0; $i<10; $i++) {
				$user = new User();
				$user->first_name = $faker->firstName;
				$user->last_name = $faker->lastName;
				$user->email = $faker->email;
				$user->username = $faker->userName;
				$user->password = $faker->password;
				$user->save();
			}
		}
		

	}

?>