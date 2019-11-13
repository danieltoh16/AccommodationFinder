<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}

$conn->select_db("accommodationfinder");

$uniqID = uniqid("RES-",true);
$address = $_POST['address'];
$numUnits = $_POST['noOfRooms'];
$sizePerUnit = $_POST['roomSize'];
$monthlyRental = $_POST['rentalPrice'];

$wrongMsg = "Creating residence profile unsuccessful. Please try again.";
$msg = "Creating residence profile successful. Returning to landlord homepage.";

$sql = "INSERT INTO residence (`resID`, `address`, `numUnits`, `sizePerUnit`, `monthlyRental`, `staffID`)
VALUES ('$uniqID', '$address', '$numUnits', '$sizePerUnit', '$monthlyRental', '')";

$defAvail = "available";

for ($i = 1; $i <= $numUnits; $i++){
  $sqlUnit = "INSERT INTO unit (`resID`, `unitNo`, `availability`) VALUES ('$uniqID', '$i', '$defAvail')";
  $result = $conn->query($sqlUnit);
}

if (($conn->query($sql) === TRUE)||($result && $result->num_rows)) {
  echo "<SCRIPT type=\"text/javascript\">alert('$msg');</SCRIPT>";
  echo("<SCRIPT type=\"text/javascript\">window.location = 'landlordHome.php';</SCRIPT>");
} else {
  echo "<SCRIPT type=\"text/javascript\">alert('$wrongMsg');</SCRIPT>";
  echo("<SCRIPT type=\"text/javascript\">window.location = 'createAccommodation.html';</SCRIPT>");
}

$conn->close();

?>
