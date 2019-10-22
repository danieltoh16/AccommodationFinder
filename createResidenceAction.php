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

$address = $_POST['address'];
$numUnits = $_POST['noOfRooms'];
$sizePerUnit = $_POST['roomSize'];
$monthlyRental = $_POST['rentalPrice'];

$wrongMsg = "Creating residence profile unsuccessful. Please try again.";
$msg = "Creating residence profile successful. Returning to landlord homepage.";

$sql = "INSERT INTO residence (`resID`, `address`, `numUnits`, `sizePerUnit`, `monthlyRental`, `staffID`) VALUES ('', '$address', '$numUnits', '$sizePerUnit', '$monthlyRental', '')";

if ($conn->query($sql) === TRUE) {
	echo "<SCRIPT>alert('$msg');</SCRIPT>";
	header ('Location: landlordHome.html');
}
else if ($result && $result->num_rows){
  echo "<SCRIPT>alert('$msg');</SCRIPT>";
	header ('Location: landlordHome.html');
}
else {
	echo "<SCRIPT>alert('$wrongMsg');</SCRIPT>";
	header ('Location: createAccommodation.html');
}

$conn->close();

?>
