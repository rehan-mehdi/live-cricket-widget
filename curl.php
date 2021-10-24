<?php
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'http://54.212.104.4:8080/api/v3/main/series_live_matches');
	curl_setopt($curl, CURLOPT_POST, false);
	curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json']);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$match_id = "";
	$match_state = "";
	$live_match_state = "";
	$team_a_name = "";
	$team_a_flag_url = "";
	$team_b_name = "";
	$team_b_flag_url = "";

	$over_team_a = "";
	$run_team_a = "";
	$wickets_team_a = "";

	$over_team_b = "";
	$run_team_b = "";
	$wickets_team_b = "";


	$result = curl_exec($curl);
	$err = curl_error($curl);
	if($err) {
		echo 'Curl Error: ' . $err;
	} else {
		$response = json_decode($result, true);
		curl_close($curl);
		echo "<pre>";
		$responseData = $response;
		print_r($responseData);

		foreach ($responseData as $key => $value) {
			
			$match_id = $value['0']['id'];
			$match_state = $value['0']['match_state'];
			$live_match_state = $value['0']['live_match_state'];
			$team_a_name = $value['0']['teamA']['name'];
			$team_a_flag_url = $value['0']['teamA']['flag_url'];
			$team_b_name = $value['0']['teamB']['name'];
			$team_b_flag_url = $value['0']['teamB']['flag_url'];

			
			
			
			if ($value['0']['innings']['0']['overs'] == NULL) {$over_team_a == 0;}
			else{$over_team_a = $value['0']['innings']['0']['overs'];}


			if ($value['0']['innings']['0']['runs'] == NULL) {$run_team_a == 0;}
			else{$run_team_a = $value['0']['innings']['0']['runs'];}

			if ($value['0']['innings']['0']['wickets'] == NULL){$wickets_team_a = 0;}
			else {$wickets_team_a = $value['0']['innings']['0']['wickets'];}

			

			if ($value['0']['innings']['1']['overs'] == NULL){$over_team_b = 0;}
			else {$over_team_b = $value['0']['innings']['1']['overs'];}

			if($value['0']['innings']['1']['runs'] == NULL){$run_team_b = 0;}
			else{$run_team_b = $value['0']['innings']['1']['runs'];}

			
			if ($value['0']['innings']['1']['wickets'] == NULL){$wickets_team_b = 0;}
			else {$wickets_team_b = $value['0']['innings']['1']['wickets'];}
			//echo $match_state, $over_team_a;

		}

		

		$servername = "localhost";
		$userdbname = "root";
		$password = "";
		$db = "azadi_mission";

		$conn = new mysqli($servername,$userdbname,$password,$db);
		if ($conn->connect_error) {
			die("Connection failed:" .$conn->connect_error);
		}

		//truncate_user_db

		//$query = "INSERT INTO userdetails(id,email,username) VALUES('$match_id','$over_team_a','$live_match_state')";

		


		
		$queryDelete = "DELETE FROM cricwick_table" ;

		$resultDelete = $conn->query($queryDelete);

		$query = "INSERT INTO cricwick_table(match_id,match_state,live_match_state,team_a_name,team_a_flag_url,team_b_name,team_b_flag_url,over_team_a,run_team_a,wickets_team_a,over_team_b,run_team_b,wickets_team_b) VALUES('$match_id','$match_state','$live_match_state','$team_a_name','$team_a_flag_url','$team_b_name','$team_b_flag_url','$over_team_a','$run_team_a','$wickets_team_a','$over_team_b','$run_team_b','$wickets_team_b')";

		

		/*$query = "UPDATE cricwick_table SET 
		match_id= '$match_id',
		match_state= '$match_state',
		live_match_state='$live_match_state',
		team_a_name= '$team_a_name',
		team_a_flag_url= '$team_a_flag_url'
		team_b_name= '$team_b_name',
		team_b_flag_url= '$team_b_flag_url',
		over_team_a= '$over_team_a',
		run_team_a= '$run_team_a',
		wickets_team_a= '$wickets_team_a',
		over_team_b= '$over_team_b',
		run_team_b= '$run_team_b',
		wickets_team_b= '$wickets_team_b' 
		WHERE id = 1; ";

		print_r($query); */





		//print_r($query);


		$result = $conn->query($query);

		//print_r($result);


		if($result==1){
			$response  = array("status"=>"1","message"=>"User details Succesfully Inserseted");
		}
		else{
			$response  = array("status"=>"0","message"=>"User details Not Inserseted");
		}

		echo json_encode($response);

		
		
	}



	

?>