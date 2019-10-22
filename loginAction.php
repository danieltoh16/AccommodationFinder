<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "accommodationFinder";

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}

//$conn->select_db("sas");

$uname = $_POST['uname'];
$pass= $_POST['password'];

$msg= "Invalid login. Please try again.";

$sql = "SELECT username FROM users WHERE username = ". "'".$uname."'" . " AND " ."password=". "'".$pass . "'" ;

$result = mysqli_query($conn,$sql);
$wrongMsg = "Invalid login";

if ($result && $result->num_rows) {
	//header('Location: ')
	$userIDs = "SELECT usertype FROM users WHERE username = ". "'".$uname."'" . " AND " ."password=". "'".$pass . "'";
	$result2 = $conn->query($userIDs);
	foreach ($result2 as  $value) {
		$utype=$value['usertype'];
		if ($utype == 0) {
			header('Location: landlordHome.html');
		}
		else if($utype == 1){
			header('Location: applicantHome.html');
		}
		else{
			echo "<SCRIPT>alert('$wrongMsg');</SCRIPT>";
			header('Location: index.html');
		}
	}

}
else {
	echo "<SCRIPT>alert('$msg');</SCRIPT>";
}

?>
