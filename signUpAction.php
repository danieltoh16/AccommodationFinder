<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}
else{
  echo("Success");
}

$conn->select_db("accommodationfinder");

$uName = $_POST['uname'];
$pass = $_POST['password'];
$fullName = $_POST['fname'];
$email = $_POST['email'];
$monthIncome = $_POST['mincome'];

$wrongMsg = "Sign up unsuccessful. Please try again.";
$msg = "Sign up successful. Proceed to login.";

$sql = "INSERT INTO users (`staffID`, `usertype`, `username`, `password`, `fullName`, `email`, `monthlyIncome`) VALUES ('', 1, '$uName', '$pass', '$fullName', '$email', '$monthIncome')";

if ($conn->query($sql) === TRUE) {
	echo "<SCRIPT>alert('$msg');</SCRIPT>";
	echo("<SCRIPT type=\"text/javascript\">window.location = 'login.html';</SCRIPT>");
}
else if ($result && $result->num_rows){
  echo "<SCRIPT>alert('$msg');</SCRIPT>";
	echo("<SCRIPT type=\"text/javascript\">window.location = 'login.html';</SCRIPT>");
}
else {
	echo "<SCRIPT>alert('$wrongMsg');</SCRIPT>";
	echo("<SCRIPT type=\"text/javascript\">window.location = 'signUp.html';</SCRIPT>");
}

$conn->close();

?>
