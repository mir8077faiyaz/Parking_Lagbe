<?php
date_default_timezone_set('Asia/Dhaka'); //get current time
require_once "connect.php";
session_start();

//echo $_SESSION["email"];

//echo $_SESSION["username"];
error_reporting(E_ERROR | E_PARSE);


?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--always connect to external css using :    ..\relative path-->
    <link rel="stylesheet" type="text/css" href="../css/details.css" />

    <!-- Bootstrap CSS -->

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <title>Parking Details</title>
  </head>

  <body>
    <!--Navbar-->
  <?php
  if(isset($_SESSION["username"]))
  {
    $user= $_SESSION["username"];
    echo '<nav class="navbar navbar-expand-lg navbar-light ">';

    echo '    <a class="navbar-brand" href="home.php">';
    echo '      <h1>Parking Lagbe</h1>';
    echo '    </a>';
    echo '    <button class="navbar-toggler btn-btn-success" type="button" data-toggle="collapse"';
    echo '      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"';
    echo '      aria-label="Toggle navigation">';
    echo '      <span class="navbar-toggler-icon"></span>';
    echo '    </button>';
    
    echo '    <div class="collapse navbar-collapse" id="navbarSupportedContent">';
    echo '      <ul class="navbar-nav">';
    echo '        <li class="nav-item active">';
    echo "          <a class='nav-link' href='userprofile.php'> $user <span class='sr-only'>(current)</span></a>";
    echo '        </li>';
    echo '        <li class="nav-item active">';
    echo '          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>';
    echo '        </li>';
    echo '        <li class="nav-item">';
    echo '          <a class="nav-link" href="about.php">About</a>';
    echo '        </li>';

    echo '        <li class="nav-item">';
    echo '          <a class="nav-link" href="logout.php">Logout</a>';
    echo '        </li>';
    echo '      </ul>';
    echo '    </div>';
    echo '  </nav>';
    
    

  }
  else{
    
echo '<nav class="navbar navbar-expand-lg navbar-light ">';
echo '    <a class="navbar-brand" href="home.php">';
echo '      <h1>Parking Lagbe</h1>';
echo '    </a>';
echo '    <button class="navbar-toggler btn-btn-success" type="button" data-toggle="collapse"';
echo '      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"';
echo '      aria-label="Toggle navigation">';
echo '      <span class="navbar-toggler-icon"></span>';
echo '    </button>';

echo '    <div class="collapse navbar-collapse" id="navbarSupportedContent">';
echo '      <ul class="navbar-nav">';
echo '        <li class="nav-item active">';
echo '          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>';
echo '        </li>';
echo '        <li class="nav-item">';
echo '          <a class="nav-link" href="about.php">About</a>';
echo '        </li>';
echo '        <li class="nav-item">';
echo '          <a class="nav-link" href="register.php">Register</a>';
echo '        </li>';
echo '        <li class="nav-item">';
echo '          <a class="nav-link" href="login.php">Login</a>';
echo '        </li>';
echo '      </ul>';
echo '    </div>';
echo '  </nav>';

  }

  ?>
    <?php
      $pid=$_GET['pid'];
      $start=$_GET['start'];
      $end=$_GET['end'];
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
      echo '<div class="deets">';
      echo '  <div style="width: 30%">';
      echo '    <img';
      echo "      src='$photo'";
      echo '      class="image1"';
      echo '      alt="Responsive image"';
      echo '    />';
      echo '  </div>';

      echo '  <div style="width: 70%" class="location-flex">';
      echo '    <div>';
      echo "      <h4 class='location'>$location</h4>";
      echo '    </div>';
      echo '    <hr />';
      echo '    <div class="more-deets">';
      echo '      <div>';
      echo "        <p><strong>Space Area :</strong> $size</p>";
      echo '      </div>';
      echo '      <div>';
      echo "        <p><strong>Security : </strong> $security</p>";
      echo '      </div>';
      echo '      <div>';
      echo "        <p><strong>Other :</strong> $others</p>";
      echo '      </div>';
      echo '      <div>';
      echo "        <p><strong>Cost: ৳$cost</strong>/hr</p>";
      echo '      </div>';
      echo '      <div>';
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
      echo "        <p><strong>Start time :</strong> $strim:00</p>";
      echo '      </div>';
      echo '      <div>';
      echo "        <p><strong>End time :</strong> $etrim:00</p>";
      echo '      </div>';
      
      echo '      <div>';
      $totalhrs=(int)$etrim-(int)$strim;
      echo "        <p><strong>Total Hours: </strong>$totalhrs</p>";
      echo '      </div>';
      echo '      <div>';
      $totalcost=(int)$totalhrs*(int)$cost;
      echo "        <p><strong>Total Cost: ৳$totalcost</strong></p>";
      echo '      </div>';

      echo '    </div>';
      $mail=$_SESSION['email'];
      $sql="Select * from `user` where Email='$mail'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      $vowner=$row['VOwner'];
      if($vowner=="yes"){
        echo "    <div><a href='payment.php?start=$strim&end=$etrim&pid=$pid&cost=$totalcost&hour=$totalhrs'class='btn btn-primary'>Book Spot</a></div>";
      }else{
        echo "    <div><a href='register.php'class='btn btn-dark'>Reg as V-Owner</a></div>";
      }

      echo '  </div>';
      echo '</div>';
      ?>




    <footer class="myfoot">
      <p>
        ©&nbsp;Parking Lagbe 2023 &nbsp;| Developed by Shajreen, Mir and Abrar
      </p>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
