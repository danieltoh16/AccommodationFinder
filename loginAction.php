<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "accommodationFinder";

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}

$uname = $_POST['uname'];
$pass= $_POST['password'];

$sql = "SELECT username FROM users WHERE username = ". "'".$uname."'" . " AND " ."password=". "'".$pass . "'" ;

$result = mysqli_query($conn,$sql);
$wrongMsg = "Invalid login. Please try again.";

if ($result && $result->num_rows) {
	$userIDs = "SELECT usertype FROM users WHERE username = ". "'".$uname."'" . " AND " ."password=". "'".$pass . "'";
	$result2 = $conn->query($userIDs);
	foreach ($result2 as  $value) {
		$utype=$value['usertype'];
		if ($utype == 0) {
      $_SESSION["Username"] = "$uname";
			echo("<SCRIPT type=\"text/javascript\">window.location = 'landlordHome.php';</SCRIPT>");
		} else if($utype == 1){
      $_SESSION["Username"] = "$uname";
			echo("<SCRIPT type=\"text/javascript\">window.location = 'applicantHome.php';</SCRIPT>");
		} else{
			echo "<SCRIPT type=\"text/javascript\">alert('$wrongMsg');</SCRIPT>";
      echo("<SCRIPT type=\"text/javascript\">window.location = 'login.html';</SCRIPT>");
		}
	}
} else {
	echo "<SCRIPT type=\"text/javascript\">alert('$wrongMsg');</SCRIPT>";
  echo("<SCRIPT type=\"text/javascript\">window.location = 'login.html';</SCRIPT>");
}

?>
