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
  <link rel="stylesheet" type="text/css" href="../Css/search.css" />

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <title>Parking Spots</title>
</head>

<body>
  <!--Navbar-->
  <?php
 if(isset($_SESSION["username"]) || isset($_COOKIE["username"]))
 {
   if(isset($_SESSION["username"])){
     $user= $_SESSION["username"];
   }
   else if(isset($_COOKIE["username"])){
     $user=$_COOKIE["username"];
   }
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
 
  <div class="container-fluid carddiv">
    <div>
      <form class="search" method="post">
      <div class="form-group">
          <label for="exampleFormControlInput1">Location &nbsp;</label> 
          <input type="text" class="form-control" id="exampleFormControlInput1"
              placeholder="Banani, Dhaka" required name="location"
              value="<?php echo isset($_POST['location']) ? $_POST['location'] : ''; ?>" />
        </div>
       <!-- Start Time Select -->
<div class="form-group" id="startTimeSelect">
  <label for="exampleFormControlSelect1">Start Time</label>
  <select class="form-control" id="exampleFormControlSelect1" name="starttime">
    <?php
      $startTimes = [
        "06:00:00", "07:00:00", "08:00:00", "09:00:00", "10:00:00",
        "11:00:00", "12:00:00", "13:00:00", "14:00:00", "15:00:00",
        "16:00:00", "17:00:00", "18:00:00", "19:00:00", "20:00:00",
        "21:00:00", "22:00:00", "23:00:00"
      ];

      foreach ($startTimes as $startTime) {
        $selected = (isset($_POST['starttime']) && $_POST['starttime'] == $startTime) ? 'selected' : '';
        echo "<option $selected>$startTime</option>";
      }
    ?>
  </select>
</div>

<!-- End Time Select -->
<div class="form-group" id="endTimeSelect">
  <label for="exampleFormControlSelect1">End Time</label>
  <select class="form-control" id="exampleFormControlSelect1" name="endtime">
    <?php
      $endTimes = [
        "06:00:00", "07:00:00", "08:00:00", "09:00:00", "10:00:00",
        "11:00:00", "12:00:00", "13:00:00", "14:00:00", "15:00:00",
        "16:00:00", "17:00:00", "18:00:00", "19:00:00", "20:00:00",
        "21:00:00", "22:00:00", "23:00:00"
      ];

      foreach ($endTimes as $endTime) {
        $selected = (isset($_POST['endtime']) && $_POST['endtime'] == $endTime) ? 'selected' : '';
        echo "<option $selected>$endTime</option>";
      }
    ?>
  </select>
</div>

        <button type="submit" class="btn form-group" name="submit">Search</button>
      </form>
    </div>
    <div class="cardflex" style="width: 70%;">
      <!--PHP HERE-->
      <?php 
        //echo date("h:00:00", time());
        if(isset($_POST["submit"])){
          $nosearch=0;
          $location=$_POST["location"];
          $start=(int)str_replace(':', '',$_POST["starttime"]);
          $end=(int)str_replace(':', '',$_POST["endtime"]);
          if($end<$start){
            echo '<script>alert("Start time cannot be after End time")</script>';
            echo '<h1> Search Again! </h1>';
          }else if($start==$end){
            echo '<script>alert("Start time cannot be the same as End time")</script>';
            echo '<h1> Search Again! </h1>';
          }
          else{
                      // using location find PID from parkingdetails table
          $sql= "SELECT * FROM `parkingspotdetails` WHERE Plocation LIKE '%$location%'";
          $result= mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($result)){
            $pid=$row['PID'];
            $bookflag=1;

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
                      //$oid=$row1['OID'];
                      //$freearr[]=$oid;
                      //free the parking space.
                      $sql3="UPDATE `activeparking` SET `Timestart`='00:00:00', `Timeend`='00:00:00', `Status`='open'";
                      $result3=mysqli_query($conn,$sql3);
                  }

                   if($start==$stime && $end==$etime){ //7-11
                    $bookflag=0;
                    //echo "here2";
                  }
                   else if($start>$stime && $end<$etime){ // 8-10
                     $bookflag=0;
                     //echo "here3";
                   }else if($start<$stime && $end<$etime && $end>$stime){ //6-7
                    $bookflag=0;
                    //echo "here4";
                   }else if($start>=$stime && $end>=$etime && $start<$etime){
                    //8 to 12, 8<11
                    $bookflag=0;
                    //echo "here5";
                   }else if($start<$stime && $end>=$etime){
                    $bookflag=0;
                    //echo "here6";
                   }else if($start<=$stime && $end<=$stime){
                    $bookflag=1;
                    //echo "here7";
                   }

                }
              // No parking was found in active parking table
              }else{
                  $sql4="INSERT INTO `activeparking`(`PID`, `Timestart`, `Timeend`, `Status`) VALUES ('$pid','00:00:00','00:00:00','open')";
                  $result4=mysqli_query($conn,$sql4); 
              }      
            }
            //display this location with the current PID once.
            if($bookflag==1){
              echo '<div class="card mt-4">';
              echo '<div class="card-header">';
              echo "<h5>" . $row['Plocation'] . "</h5>";
              echo '</div>';
              echo '<div class="card-body res-card ">';
              $img=$row['Pphoto'];
              echo "<img src='$img' class='parking-image' "; //needs styling
              echo "alt='Parking Spot Image'>";
              echo '<div class="d-flex flex-column ml-3">';

              echo "<p class='card-text'>Cost per hour:";
              echo $row['Costhour'];
              echo "</p>";
              echo "<a href='details.php?pid=$pid&start=$start&end=$end' class='btn btn-dark responsive-btn' style=\"font-family: 'Times New Roman', Times, Bangla760, serif;\">View Details</a>";

              echo '</div>';
              echo '</div>';
              echo '</div>';
              $nosearch=1;//flag to ensure a loc is shown once
            }
           
          }
          }

            if($nosearch==0){
              echo '<h1> No Results Found,Search Again! </h1>';
            }
        }
      ?>
    </div>
  </div>
  <div class="randheight">

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