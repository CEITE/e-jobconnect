<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ejobconnect";


// $servername = "localhost";
// $username = "u765170597_ejobconnect";
// $password = "hU7A:/*3J";
// $dbname = "u765170597_ejobconnect";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection Error: " . $conn->connect_error);
}


      date_default_timezone_set('Asia/Manila');

      $datestamp = date("Y-m-d");
      $timestamp = date("H:i:s");

      $date_time = date("Y-m-d H:i:s");
      $timestamp2 = date("H:i a");
      $day=date('l');
      $day_num=date('d');
      $month=date('M');
      $year=date('Y');

      $date_now = date("d/m/Y");

      $today_str = strtotime(date("Y-m-d H:i:s"));


      $end_year =date('Y', strtotime('+1 years'));

      $end_date = "03/30/".$end_year;

      $datetime1 = strtotime($date_now);
      $datetime2 = strtotime($end_date);

      $secs = $datetime2 - $datetime1;// == <seconds between the two times>
      $remaining_days = ($secs / 86400)-175;

     

function age($currentage){

  //date in mm/dd/yyyy format; or it can be in other formats as well
  $birthDate = date_format(date_create($currentage),"m/d/Y");
  //explode the date to get month, day and year
  $birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
  echo $age;
}

?>