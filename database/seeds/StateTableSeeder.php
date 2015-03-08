<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\State;

class StateTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		State::create(['action'=>'wakeup','condition'=>'{"time_from":"07:00","time_to":"09:00","sensors":["sunlight"]}','locale'=>'jp','account_id' => '1']);
		State::create(['action'=>'breakfast','condition'=>'{"time_from":"07:00","time_to":"09:00","sensors":["kettle"]}','locale'=>'jp','account_id' => '1']);
		State::create(['action'=>'goingout','condition'=>'{"time_from":"07:00","time_to":"09:00","sensors":["frontdoor"],"location":{"lat":35.914646,"lng":139.905797,"rad":0.0002}}','locale'=>'jp','account_id' => '1']);
		State::create(['action'=>'comingback','condition'=>'{"time_from":"18:00","time_to":"24:00","sensors":["frontdoor"],"location":{"lat":35.914646,"lng":139.905797,"rad":0.0002}}','locale'=>'jp','account_id' => '1']);
		State::create(['action'=>'programming','condition'=>'{"time_from":"18:00","time_to":"24:00","sensors":["desk"]}','locale'=>'jp','account_id' => '1']);
		State::create(['action'=>'sleep','condition'=>'{"time_from":"24:00","time_to":"05:00","sensors":["dark"]}','locale'=>'jp','account_id' => '1']);
	}

}
