<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Title displayed on the tab -->
  <title>View Applications - Applicant</title>

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
  <link href="css/creative3.5.min.css" rel="stylesheet">

</head>

<body id="page-top">

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
            <a class="nav-link js-scroll-trigger" href="applicantHome.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="searchAccommodation.php">Search residences</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#page-top">View applications</a>
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
          <h1 class="text-uppercase text-white font-weight-bold"><font size="7">List of applications
            made by <?php echo $_SESSION["Username"]; ?></font></h1>
          <hr class="divider my-4">
        </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th><font color="white">Date of application</font></th>
                <th><font color="white">Required month</font></th>
                <th><font color="white">Required year</font></th>
                <th><font color="white">Application status</font></th>
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

              $uName = $_SESSION["Username"];

              $lq = "SELECT * FROM application WHERE applyUName = '$uName'";
              $res = $conn->query($lq);
              foreach($res as $opt){
              ?>
                <tr>
                  <th scope="row" class="date"><font color="white"><?php echo $opt['applyDate']?></font></th>
                  <td class="month"><font color="white"><?php echo $opt['reqMonth']?></font></td>
                  <td class="year"><font color="white"><?php echo $opt['reqYear']?></font></td>
                  <td class="status"><font color="white"><?php echo $opt['status']?></font></td>
                </tr>
              <?php }?>
            </tbody>
          </table>
          <br><br>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="applicantHome.php">Back</a>
      </div>
    </div>
  </header>

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
