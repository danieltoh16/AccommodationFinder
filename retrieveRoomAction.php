<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "accommodationFinder";

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}

$searchKey = $_POST['room'];
$key = "%".$searchKey."%";

$sql = "SELECT * FROM unit WHERE resID LIKE '$key'";
$check = $conn -> query($sql);

$wrongMsg = "No results found, redirecting back to search page";

if ($check->num_rows > 0){
    echo("<SCRIPT type=\"text/javascript\">window.location = 'bookARoom.php?id=$searchKey';</SCRIPT>");
    session_start();
    $_SESSION["appResID"] = "$searchKey";
  } else {
    echo "<SCRIPT type=\"text/javascript\">alert('$wrongMsg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'searchAccommodation.html';</SCRIPT>");
  }

?>
