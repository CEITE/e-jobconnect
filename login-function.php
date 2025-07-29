<?php
		include'connect/connect.php';
		session_start();

		
		
		if(isset($_POST['email'])){
			extract($_POST);
			$passwords=md5($password);

			$sql = "SELECT * FROM admin WHERE email='$email' LIMIT 1";
			$result = $conn->query($sql);

		
			if ($result->num_rows > 0) {
				$type="admin";
			}

			$sql = "SELECT * FROM employer WHERE email='$email' LIMIT 1";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				$type="employer";
			}

			$sql = "SELECT * FROM applicant WHERE email='$email' LIMIT 1";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				$type="applicant";
			}

			


			$sql = "SELECT * FROM $type WHERE email='$email' LIMIT 1";
			$result = $conn->query($sql);

			

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
			  	extract($row);
			    if($attemp>=3){
			    	 header("location: ./login.php?error=Please Contact developer to retrieve your account. 3 Attemp already used");
			    }else{
			    	if($passwords==$password){
				    	$_SESSION['id']=$id;
				    	//$_SESSION['type']=$type;
				    		

				    		$sql = "UPDATE $type SET attemp='0' WHERE email='$email'";
							if ($conn->query($sql) === TRUE) {
							  //echo "Record updated successfully";
								header("location: ".$type."/" );
							} else {
							  echo "Error updating record: " . $conn->error;
							}
							
				    }else{

				    	$attemp = $attemp + 1; 

				    	$sql = "UPDATE $type SET attemp='$attemp' WHERE email='$email'";
						if ($conn->query($sql) === TRUE) {
						  //echo "Record updated successfully";
							$trial = 3 - $attemp;
							header("location: ./login.php?error=Wrong password you have ".$trial." more attemp");
						} else {
						  echo "Error updating record: " . $conn->error;
						}
				    	
				    	
				    }
			    }
			  }
			} else {
			 	 header("location: ./login.php?error=No account found");
			}
		}

?>