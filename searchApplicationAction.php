<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "accommodationFinder";

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}

$searchKey = $_POST['search'];
$key = "%".$searchKey."%";

$sql = "SELECT * FROM application WHERE resID LIKE '$key'";
$check = $conn -> query($sql);

$wrongMsg = "No results found, redirecting back to list of residences page";

if ($check->num_rows > 0){
    echo("<SCRIPT type=\"text/javascript\">window.location = 'listOfApplications.php?id=$searchKey';</SCRIPT>");
    session_start();
    $_SESSION["SearchKey"] = "$searchKey";
  } else {
    echo "<SCRIPT type=\"text/javascript\">alert('$wrongMsg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'landlordViewApplications.php';</SCRIPT>");
  }

?>
