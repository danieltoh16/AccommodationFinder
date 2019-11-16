<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "accommodationfinder";

$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}

$uniqID = uniqid("RES-",false);
$name = $_POST['resName'];
$address = $_POST['address'];
$numUnits = $_POST['noOfRooms'];
$sizePerUnit = $_POST['roomSize'];
$monthlyRental = $_POST['rentalPrice'];
$username = $_SESSION["Username"];

$wrongMsg = "Creating residence profile unsuccessful. Please try again.";
$msg = "Creating residence profile successful. Returning to landlord homepage.";
$haveName = "Residence Name already exists in the database, please try again";
$haveAddr = "Residence Address already exists in the database, please try again";

$getStaffID = "SELECT * FROM users WHERE username = ('$username')";
$checkerStaffID = $conn -> query($getStaffID);
if ($checkerStaffID->num_rows>0){
  while ($row = $checkerStaffID->fetch_assoc()){
    $getUserName = $row["username"];
  }
}
$getUName = $getUserName;

$sql = "INSERT INTO residence (`resID`, `resName`, `address`, `numUnits`, `sizePerUnit`, `monthlyRental`, `staffID`)
VALUES ('$uniqID', '$name', '$address', '$numUnits', '$sizePerUnit', '$monthlyRental', '$getUName')";

$checkResName = "SELECT * FROM residence WHERE resName = ('$name')";
$checkerName = $conn -> query($checkResName);
$checkAddr = "SELECT * FROM residence WHERE address = ('$address')";
$checkerAddress = $conn -> query($checkAddr);

$defAvail = "available";

if ($checkerName->num_rows > 0){
  echo "<SCRIPT type=\"text/javascript\">alert('$haveName');</SCRIPT>";
  echo("<SCRIPT type=\"text/javascript\">window.location = 'createAccommodation.html';</SCRIPT>");
} else if ($checkerAddress->num_rows > 0){
  echo "<SCRIPT type=\"text/javascript\">alert('$haveAddr');</SCRIPT>";
  echo("<SCRIPT type=\"text/javascript\">window.location = 'createAccommodation.html';</SCRIPT>");
} else {
  if (($conn->query($sql) === TRUE)||($result && $result->num_rows)) {
    for ($i = 1; $i <= $numUnits; $i++){
      $sqlUnit = "INSERT INTO unit (`resID`, `unitNo`, `availability`) VALUES ('$uniqID', '$i', '$defAvail')";
      $result = $conn->query($sqlUnit);
    }
    echo "<SCRIPT type=\"text/javascript\">alert('$msg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'landlordHome.php';</SCRIPT>");
  } else {
    echo "<SCRIPT type=\"text/javascript\">alert('$wrongMsg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'createAccommodation.html';</SCRIPT>");
  }
}

$conn->close();

?>
