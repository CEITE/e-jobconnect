<?php
include'../connect/connect.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($action == "enroll" && $id > 0) {
    file_put_contents("request.txt", "ENROLL$id"); // Store command for ESP32
    echo "Enroll command sent for ID $id";
        if($id<=100 && $id>=1){
            $table='faculty';
        }else{
            $table='student';
        }
    header("location: ./?page=$table");
} elseif ($action == "delete" && $id > 0) {
        if($id<=100 && $id>=1){
            $table='faculty';
        }else{
            $table='student';
        }

        file_put_contents("request.txt", "DELETE$id"); // Store command for ESP32
        echo "Delete command sent for ID $id";
        header("location: ./?page=$table&remove=test&id=$id");

    // for ($id=1; $id < 21; $id++) { 
    //     file_put_contents("request.txt", "DELETE$id"); // Store command for ESP32
    //     echo "Delete command sent for ID $id";
    // }
    
} elseif ($action == "check") {
    if (file_exists("request.txt")) {
        echo file_get_contents("request.txt"); // ESP32 reads command
        unlink("request.txt"); // Clear command after reading
    } else {
        echo "NONE"; // No command available
    }
} elseif ($action == "enroll_success" && $id > 0) {
    if($id<=100 && $id>=1){
            $table='faculty';
        }else{
            $table='student';
        }
    $conn->query("UPDATE $table SET fingerprint='$id' WHERE fingerprint='' "); // Save enrolled ID
    echo "Enroll Success";
} elseif ($action == "enroll_fail" && $id > 0) {
    if($id<=100 && $id>=1){
            $table='faculty';
        }else{
            $table='student';
        }

        header("location: ./?action=enroll&id=$id");
    // $conn->query("UPDATE $table SET fingerprint='$id' WHERE fingerprint='' "); // Save enrolled ID
    // echo "Enroll Success";
} elseif ($action == "delete_success" && $id > 0) {
    $conn->query("DELETE FROM fingerprints WHERE id='$id'");
    echo "Delete Success";
} elseif ($action == "scan" && $id > 0) {
    // Check if fingerprint is registered
    $result = $conn->query("SELECT * FROM fingerprints WHERE id='$id'");
    if ($result->num_rows > 0) {
        // Store scan log
        $conn->query("INSERT INTO scan (fingerprint_id, scan_time) VALUES ('$id', NOW())");
        echo "Scan Success";
    } else {
        echo "Fingerprint Not Found";
    }
}

$conn->close();
?>
