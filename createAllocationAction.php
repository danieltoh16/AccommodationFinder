<?php
//create session
session_start();

//connect to db
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}

$conn->select_db("accommodationfinder");

//initialise and fetch values
$alcID = uniqid("ALC-",false);
$date = $_POST['reqDate'];
$status = $_POST['application'];
$resID = $_SESSION["resID"];

$getApplicationDetails = "SELECT * FROM application WHERE resID = '$resID'";
$checkerApplyDetails = $conn -> query($getApplicationDetails);
if ($checkerApplyDetails->num_rows>0){
  while ($row = $checkerApplyDetails->fetch_assoc()){
    $getApplyID = $row["applyID"];
    $getApplyUName = $row["applyUName"];
    $getUnitNumber = $row["unitNo"];
    $getTimeLength = $row["duration"];
  }
}
$applyID = $getApplyID;
$username = $getApplyUName;
$unitNo = $getUnitNumber;
$duration = $getTimeLength;

$getUnitDetails = "SELECT * FROM unit WHERE unitNo = '$unitNo' AND resID = '$resID'";
$checkerUnitDetails = $conn -> query($getUnitDetails);
if ($checkerUnitDetails->num_rows>0){
  while ($row = $checkerUnitDetails->fetch_assoc()){
    $getUnitID = $row["unitID"];
  }
}
$unitID = $getUnitID;

//initialise messages
$cannotAccept = "Application is automatically rejected by the system because applicant does not have the
monthly income to afford the residence";
$errorMsg = "Our system has encountered an error. Please check your connection and try again.";
$acceptMsg = "Accepting request is successful! Redirecting back to list of residences page.";
$acceptWrongMsg = "Accepting request failed. Please try again.";
$waitMsg = "Request successfully added to waitlist! Redirecting back to list of residences page.";
$waitWrongMsg = "Adding request to waitlist failed. Please try again.";
$rejectMsg = "Rejecting request is successful! Redirecting back to list of residences page.";
$rejectWrongMsg = "Accepting request failed. Please try again.";
$noDateEnteredMsg = "Please enter a date";

//if-else to decide what to do given situation
if ($status == "Approved") {
  if ($date == ""){
    echo "<SCRIPT type=\"text/javascript\">alert('$noDateEnteredMsg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'applicationDetails.php';</SCRIPT>");
  } else {
    $createAllocationQuery = "INSERT INTO allocation (`allocateID`, `fromDate`, `duration`, `unitID`, `applyID`)
    VALUES ('$alcID', '$date', '$duration', '$unitID', '$applyID')";
    $updateStatusQuery = "UPDATE application SET status = 'Approved' WHERE applyID = '$applyID'";
    $updateAvailabilityQuery = "UPDATE unit SET availability = 'booked' WHERE unitID = '$unitID'";
    if (($conn->query($createAllocationQuery) === TRUE)&&($conn->query($updateStatusQuery) === TRUE)
    &&($conn->query($updateAvailabilityQuery) === TRUE)) {
      echo "<SCRIPT type=\"text/javascript\">alert('$acceptMsg');</SCRIPT>";
      echo("<SCRIPT type=\"text/javascript\">window.location = 'landlordViewApplications.php';</SCRIPT>");
    } else {
      echo "<SCRIPT type=\"text/javascript\">alert('$acceptWrongMsg');</SCRIPT>";
      echo("<SCRIPT type=\"text/javascript\">window.location = 'applicationDetails.php';</SCRIPT>");
    }
  }
} else if ($status == "Waitlist") {
  $updateStatusQuery = "UPDATE application SET status = 'Waitlist' WHERE applyID = '$applyID'";
  if ($conn->query($updateStatusQuery) === TRUE) {
    echo "<SCRIPT type=\"text/javascript\">alert('$waitMsg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'landlordViewApplications.php';</SCRIPT>");
  } else {
    echo "<SCRIPT type=\"text/javascript\">alert('$waitWrongMsg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'applicationDetails.php';</SCRIPT>");
  }
} else if ($status == "Rejected") {
  $updateStatusQuery = "UPDATE application SET status = 'Rejected' WHERE applyID = '$applyID'";
  if ($conn->query($updateStatusQuery) === TRUE) {
    echo "<SCRIPT type=\"text/javascript\">alert('$rejectMsg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'landlordViewApplications.php';</SCRIPT>");
  } else {
    echo "<SCRIPT type=\"text/javascript\">alert('$rejectWrongMsg');</SCRIPT>";
    echo("<SCRIPT type=\"text/javascript\">window.location = 'applicationDetails.php';</SCRIPT>");
  }
} else {
  echo "<SCRIPT type=\"text/javascript\">alert('$errorMsg');</SCRIPT>";
  echo("<SCRIPT type=\"text/javascript\">window.location = 'landlordViewApplications.php';</SCRIPT>");
}

$conn->close();

?>
