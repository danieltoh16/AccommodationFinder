<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}

$conn->select_db("accommodationfinder");

$uName = $_POST['uname'];
$pass = $_POST['password'];
$fullName = $_POST['fname'];
$email = $_POST['email'];
$monthIncome = $_POST['mincome'];

$wrongMsg = "Sign up unsuccessful. Please try again.";
$msg = "Sign up successful. Proceed to login.";
$uNameError = "This username is already taken. Please try another username";
$emailError = "This email is already taken. Please try another email";

$sql = "INSERT INTO users (`staffID`, `usertype`, `username`, `password`, `fullName`, `email`, `monthlyIncome`) VALUES ('', 1, '$uName', '$pass', '$fullName', '$email', '$monthIncome')";
$sql_uName = "SELECT COUNT (*) FROM users WHERE username LIKE '$uName'";
$sql_email = "SELECT COUNT (*) FROM users WHERE email LIKE '$email'";

if (($conn->query($sql) === TRUE)||($result && $result->num_rows)) {
	if ($sql_uName > 0){
    echo "<SCRIPT>alert('$sql_uName');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'signUp.html';</SCRIPT>");
  } else if ($sql_email > 0){
    echo "<SCRIPT>alert('$sql_email');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'signUp.html';</SCRIPT>");
  } else {
    echo "<SCRIPT>alert('$msg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'login.html';</SCRIPT>");
  }
}
else {
	echo "<SCRIPT>alert('$wrongMsg');</SCRIPT>";
	echo("<SCRIPT type=\"text/javascript\">window.location = 'signUp.html';</SCRIPT>");
}

$conn->close();

?>
