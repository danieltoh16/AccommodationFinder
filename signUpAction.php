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
$haveUsername = "Username is taken, please try another one";
$haveEmail = "Email is taken, please try another one";

$sql = "INSERT INTO users (`staffID`, `usertype`, `username`, `password`, `fullName`, `email`, `monthlyIncome`)
VALUES ('', 1, '$uName', '$pass', '$fullName', '$email', '$monthIncome')";

$checkUsername = "SELECT * FROM users WHERE username = ('$uName')";
$checkerU = $conn -> query($checkUsername);
$checkEmail = "SELECT * FROM users WHERE email = ('$email')";
$checkerE = $conn -> query($checkEmail);
$userExists = False;

if (($conn->query($sql) === TRUE)||($result && $result->num_rows)) {
  if ($checkerU->num_rows > 0){
    echo "<SCRIPT type=\"text/javascript\">alert('$haveUsername');</SCRIPT>";
  	echo("<SCRIPT type=\"text/javascript\">window.location = 'signUp.html';</SCRIPT>");
  } else if ($checkerE->num_rows > 0) {
    echo "<SCRIPT type=\"text/javascript\">alert('$haveEmail');</SCRIPT>";
  	echo("<SCRIPT type=\"text/javascript\">window.location = 'signUp.html';</SCRIPT>");
  } else {
    echo "<SCRIPT type=\"text/javascript\">alert('$msg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'login.html';</SCRIPT>");
  }
}
else {
	echo "<SCRIPT type=\"text/javascript\">alert('$wrongMsg');</SCRIPT>";
	echo("<SCRIPT type=\"text/javascript\">window.location = 'signUp.html';</SCRIPT>");
}

$conn->close();

?>
