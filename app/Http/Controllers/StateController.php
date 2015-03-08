<?php namespace App\Http\Controllers;

use App\State;

class StateController extends Controller {

	public function index () {
		$requests = \Request::all();
		
		$results = [];
		foreach (State::all() as $state) {

			$condition = json_decode($state->condition, true);

			$condition_is_true = true;
			if(array_key_exists( "sensors", $condition)){
				if(!array_key_exists("sensors", $requests)){
					$condition_is_true = false;
				}else{
					if($condition["sensors"][0] !== $requests["sensors"]){
						$condition_is_true = false;
					}
				}
			}


			if($condition_is_true && array_key_exists("time_to", $condition) && array_key_exists("time_from", $condition)){
				if(!array_key_exists("time_at", $requests)){
					$condition_is_true = false;
				}else{
					$current_time = strtotime( date("Y-m-d"). " " .$requests["time_at"]);	
					$from = strtotime( date("Y-m-d"). " " .$condition["time_from"]);
					$to = strtotime(date("Y-m-d"). " " . $condition["time_to"]);

					// echo $current_time . " " . $from . " " . $to . " <br />";

					if($current_time > $from && $current_time < $to){
						$condition_is_true = false;
					}
				}
			}


			if($condition_is_true){
				array_push($results,$state->action);	
			}
		}

		$data = [
			"action" => $results[0]
		];
		return $this->response($data);
	}

	private function response($data){
		return \Response::json($data,200,array('Access-Control-Allow-Origin' => '*'));
	}
	
}
