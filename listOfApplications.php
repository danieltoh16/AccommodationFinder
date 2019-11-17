<?php
  session_start();
  $_SESSION["resID"] = $_SESSION["SearchKey"];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Title displayed on the tab -->
  <title>View Applications - Landlord</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Favicon (Icon displayed at tab in browser) -->
  <link href="img/favicon-32x32.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative4.5.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <form action="retrieveApplicationAction.php" method="post">

  <!-- Navigation bar-->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.html">AccommodationFinder</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="landlordHome.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="createAccommodation.html">Create residence</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="landlordViewApplications.php">View applications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.html">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold"><font size="7">Select an application to review</font></h1>
          <hr class="divider my-4">
        </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th><font color="white">Application ID</font></th>
                <th><font color="white">Application Date</font></th>
                <th><font color="white">Required Month</font></th>
                <th><font color="white">Required Year</font></th>
                <th><font color="white">Status</font></th>
                <th><font color="white">Applicant Username</font></th>
                <th><font color="white">Unit Number</font></th>
                <th><font color="white">Duration</font></th>
              </tr>
            </thead>
            <tbody>
              <?php
                $servername = "localhost";
                $username = "root";
                $password = "";

                $conn = new mysqli($servername, $username, $password);

                if ($conn->connect_error) {
                    echo("Connection failed: " . $conn->connect_error);
                }
                $conn->select_db("accommodationfinder");

                $searchKeyword = "%".$_SESSION["resID"]."%";

                $lq = "SELECT * FROM application WHERE resID LIKE '$searchKeyword'";
                $res = $conn->query($lq);
                foreach($res as $opt){
              ?>
                <tr>
                  <td scope="row" class="applyID"><font color="white"><?php echo $opt['applyID']?></font></td>
                  <td class="applyDate"><font color="white"><?php echo $opt['applyDate']?></font></td>
                  <td class="reqMonth"><font color="white"><?php echo $opt['reqMonth']?></font></td>
                  <td class="reqYear"><font color="white"><?php echo $opt['reqYear']?></font></td>
                  <td class="status"><font color="white"><?php echo $opt['status']?></font></td>
                  <td class="uName"><font color="white"><?php echo $opt['applyUName']?></font></td>
                  <td class="unitNo"><font color="white"><?php echo $opt['unitNo']?></font></td>
                  <td class="duration"><font color="white"><?php echo $opt['duration']?></font></td>
                </tr>
              <?php }?>
            </tbody>
          </table>
          <div class="col-lg-8 align-self-baseline">
            <p class="text-white-75 font-weight-light mb-5"><font size="3" color="white"><b>Enter the ID of the
              application that you want to review (copy the application ID and paste it below)</b></font></p>
            <div class="form-group has-danger">
                <label class="sr-only" for="search">Search</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input type="search" name="appID" class="form-control" id="appID"
                    placeholder="Type here..." required autofocus ></input>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>&nbsp  Search</button>
                </div>
            </div><br>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="landlordViewApplications.php">Back</a>
          </div>
      </div>
    </div>
  </header>
</form>

  <!-- Footer -->
  <!-- This section shows the copyright of the website-->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Adib Raup and Daniel Toh</div>
      <div class="small text-center text-muted">All Rights Reserved</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

</body>

</html>
