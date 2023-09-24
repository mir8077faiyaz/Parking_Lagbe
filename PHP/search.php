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
  <link rel="stylesheet" type="text/css" href="../css/search.css" />

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <title>Parking Spots</title>
</head>

<body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light ">
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

  <!--jhamela-->
  <div class="container-fluid carddiv">
    <div>
      <form class="search" method="post">
        <div class="form-group">
          <label for="exampleFormControlInput1">Location</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="banani,dhaka,bangladesh"
            required name="location" />
        </div>
        <div class="form-group" id="startTimeSelect">
          <label for="exampleFormControlSelect1">Start Time</label>
          <select class="form-control" id="exampleFormControlSelect1" name="starttime">
            <option>06:00:00</option>
            <option>07:00:00</option>
            <option>08:00:00</option>
            <option>09:00:00</option>
            <option>10:00:00</option>
            <option>11:00:00</option>
            <option>12:00:00</option>
            <option>13:00:00</option>
            <option>14:00:00</option>
            <option>15:00:00</option>
            <option>16:00:00</option>
            <option>17:00:00</option>
            <option>18:00:00</option>
            <option>19:00:00</option>
            <option>20:00:00</option>
            <option>21:00:00</option>
            <option>22:00:00</option>
            <option>23:00:00</option>
          </select>
        </div>
        <div class="form-group" id="endTimeSelect">
          <label for="exampleFormControlSelect1">End Time</label>
          <select class="form-control" id="exampleFormControlSelect1" name="endtime">
            <option>06:00:00</option>
            <option>07:00:00</option>
            <option>08:00:00</option>
            <option>09:00:00</option>
            <option>10:00:00</option>
            <option>11:00:00</option>
            <option>12:00:00</option>
            <option>13:00:00</option>
            <option>14:00:00</option>
            <option>15:00:00</option>
            <option>16:00:00</option>
            <option>17:00:00</option>
            <option>18:00:00</option>
            <option>19:00:00</option>
            <option>20:00:00</option>
            <option>21:00:00</option>
            <option>22:00:00</option>
            <option>23:00:00</option>
          </select>
        </div>
        <button type="submit" class="btn btn-danger form-group" name="submit">Search</button>
      </form>
    </div>
    <div class="cardflex" style="width: 75%;">
      <!--PHP HERE-->
      <?php 
        //echo date("h:00:00", time());
        if(isset($_POST["submit"])){
          $freearr=[];
          $location=$_POST["location"];
          $start=(int)str_replace(':', '',$_POST["starttime"]);
          $end=(int)str_replace(':', '',$_POST["endtime"]);

          // using location find PID from parkingdetails table
          $sql= "SELECT * FROM `parkingspotdetails` WHERE Plocation LIKE '%$location%'";
          $result= mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($result)){
            $pid=$row['PID'];

            // check if this PID already exists in the active parking table and slots are free.
            $sql1="SELECT * FROM `activeparking` WHERE `PID`='$pid'";
            $result1= mysqli_query($conn,$sql1);
            if($result1){
              $count=mysqli_num_rows($conn->query($sql1));
              if($count>0){
                //For the existing parkings in active parking, update any necessary slots.
                $cur =date("h:00:00", time());
                $currint=(int)str_replace(':', '',$cur); // current time in integer
                while($row1=mysqli_fetch_assoc($result1)){
                  $stime=(int)str_replace(':', '',$row1["Timestart"]); //start time in integer
                  $etime=(int)str_replace(':', '',$row1["Timeend"]); //end time in integer
                  $status=$row1["Status"];
                  if(($currint>=$etime) && $status=="booked"){
                      // Lists the spot which was booked.
                      $oid=$row1['OID'];
                      $freearr[]=$oid;
                      //free the parking space.
                      $sql3="UPDATE `activeparking` SET `Timestart`='00:00:00', `Timeend`='00:00:00', `Status`='open'";
                      $result3=mysqli_query($conn,$sql3);
                  }
                }
              // No parking was found in active parking table
              }else{
                  $sql4="INSERT INTO `activeparking`(`PID`, `Timestart`, `Timeend`, `Status`) VALUES ('$pid','00:00:00','00:00:00','open')";
                  $result4=mysqli_query($conn,$sql4); 
              }      
            }
            //display this location with the current PID once.
            echo '<div class="card mt-4">';
            echo '<div class="card-header">';
            echo $row['Plocation'];
            echo '</div>';
            echo '<div class="card-body">';
            $img=$row['Pphoto'];
            //echo $img;
            // $base64ImageData = base64_encode($img);
            // // Define a directory to save the image
            // $directory = "DBImages"; // Change this to your desired directory

            // // Generate a unique file name (you can use other methods if needed)
            // $fileName = uniqid() . ".jpg"; // Assumes the image format is JPEG

            // // Save the image data to the specified file
            // $filePath = $directory . $fileName;
            // file_put_contents($filePath, $base64ImageData);

            echo "<img src='$img' ";
            echo "alt='Parking Spot Image'>";
            echo "<p class='card-text'>Cost per hour:";
            echo $row['Costhour'];
            echo "</p>";
            echo '<a href="details.html" class="btn btn-primary">View Details</a>';
            echo '</div>';
            echo '</div>';
          }


        }
      ?>
    </div>
  </div>

  <footer class="myfoot">
    <p>©&nbsp;Parking Lagbe 2023 &nbsp;| Developed by Shajreen, Mir and Abrar</p>
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