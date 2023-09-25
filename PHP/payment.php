<?php
date_default_timezone_set('Asia/Dhaka'); //get current time
require_once "connect.php";
session_start();

//echo $_SESSION["email"];

//echo $_SESSION["username"];

?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--always connect to external css using :    ..\relative path-->
  <link rel="stylesheet" type="text/css" href="../css/payment.css" />

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <title>Payment Page</title>
</head>

<body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">
      <h1>Parking Lagbe</h1>
    </a>
    <button class="navbar-toggler btn-btn-success" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.html">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.html">Login</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php
      $pid=$_GET['pid'];
      $start=$_GET['start'];
      $end=$_GET['end'];
      $totalhrs=$_GET['hour'];
      $totalcost=$_GET['cost'];
      $sql="SELECT * FROM `parkingspotdetails` WHERE PID='$pid'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      $location=$row['Plocation'];
      $map=$row['Pcoordinate'];
      $photo=$row['Pphoto'];
      $size=$row['Psize'];
      $cost=$row['Costhour'];
      $security=$row['Security'];
      $others=$row['Others']
    ?>
 <?php
 echo "<form method='post'>";
 echo "<div class=\"container-fluid\">";
 echo "    <div>";
 echo "      <h1>Parking Summary:</h1>";
 echo "    </div>";
 echo "    <div class=\"table-responsive-md\">";
 echo "      <table class=\"table\">";
 echo "        <thead class=\"thead-dark\">";
 echo "          <tr>";
 echo "            <th scope=\"col\">Space Image</th>";
 echo "            <th scope=\"col\">Location</th>";
 echo "            <th scope=\"col\">Start Time</th>";
 echo "            <th scope=\"col\">End Time</th>";
 echo "            <th scope=\"col\">Total Hours</th>";
 echo "            <th scope=\"col\">Total Cost</th>";
 echo "            <th scope=\"col\">Paypal</th>";
 echo "          </tr>";
 echo "        </thead>";
 echo "        <tbody>";
 echo "          <tr>";
 echo "            <th scope=\"row\">  <img src='$photo' alt=\"\"> </th>";
 echo "            <td>$location</td>";
 if($start=="100000" || $start=="200000"){
  $strim=rtrim($start, '0');
  $strim=$strim.'0';
  }else{
    $strim=rtrim($start, '0');
  }
  if($end=="100000" || $end=="200000"){

    $etrim=rtrim($end, '0');
    $etrim=$etrim.'0';
    echo $etrim;
  }
  else{
    $etrim=rtrim($end, '0');
  }
 echo "            <td>$strim:00</td>";
 echo "            <td>$etrim:00</td>";
 echo "            <td>$totalhrs</td>";
 echo "            <td>$totalcost</td>";
 echo "            <td><button type=\"submit\" name=\"submit\" class=\"btn btn-danger\">Confirm Payment</button></td>";
 //echo "            <td>Paypal Integration</td>";
 echo "          </tr>";
 echo "        </tbody>";
 echo "      </table>";
 echo "    </div>";
 echo "  </div>";
 echo "</form>";
 ?>


  <footer class="myfoot">
    <p>
      ©&nbsp;Parking Lagbe 2023 &nbsp;| Developed by Shajreen, Mir and Abrar
    </p>
  </footer>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

    <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>

<?php
  if(isset($_POST['submit'])){
    $sql = "UPDATE `activeparking` SET `Timestart`='$strim:00:00', `Timeend`='$etrim:00:00', `Status`='booked' WHERE `PID`='$pid' AND `Status`='open'";

    $result=mysqli_query($conn,$sql);
    $sql4="INSERT INTO `activeparking`(`PID`, `Timestart`, `Timeend`, `Status`) VALUES ('$pid','00:00:00','00:00:00','open')";
    $result4=mysqli_query($conn,$sql4);

    $mail=$_SESSION['email'];
    $sql="Select * from `user` where Email='$mail'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $uid=$row['UID'];
    $sql="Select * from `vehicledetails` where UID='$uid'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $vid=$row['VID'];
    $date=date("Y/m/d");
    // insert into parking history
    $sqlf="INSERT INTO `parkinghistory`(`VID`, `PID`, `Date`, `TotalHours`, `TotalCost`) VALUES ('$vid','$pid','$date','$totalhrs','$totalcost')";
    $res=mysqli_query($conn,$sqlf);
  }

?>
