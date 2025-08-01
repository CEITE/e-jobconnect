<?php
include'../connect/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fingerprint_id = isset($_POST['fingerprint_id']) ? intval($_POST['fingerprint_id']) : 0;

    if ($fingerprint_id > 0) {
        if($fingerprint_id<=100 && $fingerprint_id>=1){
            $table='faculty';
            
        }else{
            $table='student';
            
        }

            $sql = "SELECT *,(SELECT status FROM attendance WHERE fingerprint='$fingerprint_id' ORDER BY id DESC LIMIT 1) AS attendance_status FROM $table WHERE fingerprint='$fingerprint_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
               extract($row);

                    if($attendance_status=="Time in"){
                        $logs="Time out";
                    }else if($attendance_status=="Time out"){
                        $logs="Time in";
                    }else{
                        $logs="Time in";
                    }

                   

              }
            }

                    if($table=="faculty"){
                        $msg="Dear Faculty/ Staff, this is to confirm your successful ".$logs." at the campus today at ".$date_time.". Thank you for your dedication and commitment to our students. Have a productive and fulfilling day ahead";
                   }else{
                        $msg="Dear Parents, this is to inform your Child has successfully ".$logs." at the campus today at ".$date_time.". We prioritize their safety and well-being while they are here. If you have any concerns, feel free to reach out to us. Have a great day! ";
                   }

        $sql = "INSERT INTO attendance SET fingerprint='$fingerprint_id', date_time=NOW(), table_name='$table', status='$logs'";

        if ($conn->query($sql) === TRUE) {

            $sql = "SELECT * FROM $table WHERE id='$fingerprint_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                extract($row);
                $sql = "INSERT INTO ozekimessageout SET receiver='+$contact', msg='$msg', status='send'";
                $conn->query($sql);
              }
            } 

           echo "Scan saved successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid fingerprint ID";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
