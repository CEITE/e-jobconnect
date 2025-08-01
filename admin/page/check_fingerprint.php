<?php
include'../../connect/connect.php';

		$table=$_GET['table'];

    $sql = "SELECT * FROM $table WHERE fingerprint='' LIMIT 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		    echo $row['id'];
		  }
	} else {
	  echo "0";
	}
	$conn->close();


?>