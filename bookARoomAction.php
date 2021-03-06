<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}

$conn->select_db("accommodationfinder");

$appID = uniqid("APP-",false);
$appDate = date('Y-m-d');

$date = $_POST['reqDate'];
$reqdate = explode('-', $date);
$month = $reqdate[1];
if ($month == 1){
  $month = "January";
} else if ($month == 2){
  $month = "February";
} else if ($month == 3){
  $month = "March";
} else if ($month == 4){
  $month = "April";
} else if ($month == 5){
  $month = "May";
} else if ($month == 6){
  $month = "June";
} else if ($month == 7){
  $month = "July";
} else if ($month == 8){
  $month = "August";
} else if ($month == 9){
  $month = "September";
} else if ($month == 10){
  $month = "October";
} else if ($month == 11){
  $month = "November";
} else {
  $month = "December";
}
$year = $reqdate[0];

$status = "New";
$applicant = $_SESSION["Username"];
$residence = $_SESSION["appResID"];
$unumber = $_POST['unitNo'];
$duration = $_POST['duration'];

$searchingKey = $_SESSION["appResID"];

$wrongMsg = "Application for this room unsuccessful. Please try again.";
$msg = "Application for this room successfully created. Returning to applicant homepage";
$roomMsg = "Wrong room number entered. Please try again.";

$sql = "INSERT INTO application (`applyID`, `applyDate`, `reqMonth`, `reqYear`, `status`, `applyUName`, `resID`, `unitNo`, `duration`)
VALUES ('$appID', '$appDate', '$month', '$year', '$status', '$applicant', '$residence', '$unumber', '$duration')";
$checkSQL = "SELECT unitNo FROM unit WHERE resID LIKE '$residence' AND unitNo LIKE '$unumber'";
$checker = $conn -> query($checkSQL);

if ($checker->num_rows > 0){
  if (($conn->query($sql) === TRUE)||($result && $result->num_rows)) {
    echo "<SCRIPT type=\"text/javascript\">alert('$msg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'applicantHome.php';</SCRIPT>");
  } else {
    echo "<SCRIPT type=\"text/javascript\">alert('$wrongMsg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'bookARoom.php?id=$searchingKey';</SCRIPT>");
  }
} else {
  echo "<SCRIPT type=\"text/javascript\">alert('$roomMsg');</SCRIPT>";
  echo("<SCRIPT type=\"text/javascript\">window.location = 'bookARoom.php?id=$searchingKey';</SCRIPT>");
}

$conn->close();

?>
