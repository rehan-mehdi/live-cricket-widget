<?php
			$conn = mysqli_connect("rm-gs5w3hl7g5l60o067.mysql.singapore.rds.aliyuncs.com", "dbtuser", "Daraz_123", "cricwick");
			if ($conn-> connect_error) {
				die("Connection failed:". $conn-> connect_error);
			}

			$sql = "SELECT match_id,match_state,live_match_state,team_a_name,team_a_flag_url,team_b_name,team_b_flag_url,over_team_a,run_team_a,wickets_team_a,over_team_b,run_team_b,wickets_team_b from cricwick_table";


			$result = $conn-> query($sql);

			if ($result-> num_rows > 0) {
				while ($row = $result-> fetch_assoc()) {
					if ($row["live_match_state"]) {
					echo 
						"<div class='container-fluid'>
						<div class='card mx-auto card-cus'>
						  <div class='card-body'>
						    <h6 class='card-title'><span style='color:#C92D37;	'><svg height='20' width='20' class='blinking'>
						    <circle cx='10' cy='10' r='3.5' fill='red' /></svg>LIVE</span> &nbsp;T20 &nbsp;16<sup>th</sup> &nbsp;MATCH</h6>
						    <div class='row' style='margin-right: 0px; margin-left:0px;'>
						    	<div class='teams-name'>
							    	<div class='col-xs-12' style='width:100%;'>
							    		<div class='col-xs-6' style='width: 10%; display: inline-block;'><img src='".$row["team_a_flag_url"]."' width='15' /></div>
							    		<div class='col-xs-6' style='width: 50%; display: inline-block; font-size: 15px;'> ".$row["team_a_name"]."</div>
							    	</div>
							    	<div class='col-xs-12' style='width:100%'>
							    		<div class='col-xs-6' style='width: 10%; display: inline-block;'><img src='".$row["team_b_flag_url"]."' width='15' /></div>
							    		<div class='col-xs-6' style='width: 50%; display: inline-block; font-size: 15px;'> ".$row["team_b_name"]."</div>
							    	</div>
							    </div>
							    <div class='teams-score'>
							    	<div class='col-xs-12' style='width:100%'>
							    		<h6 class='col-xs-6 card-title' style='width: 100%; display: inline-block; margin:0px;'>".$row["run_team_a"]."/".$row["wickets_team_a"]."<span style='color: #444444; font-size: 14px; font-weight: 300;'>(".$row["over_team_a"].")</span></h6>
							    	</div>
							    	<div class='col-xs-12' style='width:100%'>
							    		<h6 class='col-xs-6 card-title' style='width: 100%; display: inline-block; margin:0px;'>".$row["run_team_b"]."/".$row["wickets_team_b"]."<span style=' color: #444444; font-size: 14px; font-weight: 300;'>(".$row["over_team_b"].")</span></h6>
							    	</div>
							    </div>
						    </div>
						    
						    <p style='color: #707070; font-weight: 300; padding-top:10px; font-size: 13px;'>".$row["team_b_name"]." chose to bowl</p></div>
						</div>
						</div>";
					}
					else {
						
					}
				}
				echo "</table>";
			}
			else {
				echo "
					<div class='container-fluid'>
						<div class='card mx-auto card-cus'>
						  <div class='card-body'>
						    <h6 class='card-title text-center'><span style='color:#C92D37;'>Stay Tuned with Daraz</h6>
						</div>
					</div>
				";
			}


			$conn-> close();
		?>
