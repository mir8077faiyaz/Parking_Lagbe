<?php
session_start(); //can never be written later, won't work, will show header has been sent
date_default_timezone_set("Asia/Dhaka"); //get current time
require_once "connect.php";

//runs connect.php to create database connection
?>


<html lang="en">

<head> <!--doesn't show in body content (in main page)--> 
  <meta charset="UTF-8" /> <!--vocab-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- compatible for different device-->
  <!--always connect to external css using :    ..\relative path-->
  <link rel="stylesheet" type="text/css" href="../Css/home.css" />

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <title>Home</title>
</head>

<body>
  <!--Navbar-->
  <?php if (isset($_SESSION["username"]) || isset($_COOKIE["username"])) {
      /*isset checks if the variable holds any value */
      if (isset($_SESSION["username"])) {
          $user = $_SESSION["username"];
      } elseif (isset($_COOKIE["username"])) {
          $user = $_COOKIE["username"];
      }

      echo '<nav class="navbar navbar-expand-lg navbar-light ">';

      echo '    <a class="navbar-brand" href="home.php">';
      echo "      <h1>Parking Lagbe</h1>";
      echo "    </a>";
      echo '    <button class="navbar-toggler btn-btn-success" type="button" data-toggle="collapse"';
      echo '      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"';
      echo '      aria-label="Toggle navigation">';
      echo '      <span class="navbar-toggler-icon"></span>';
      echo "    </button>";

      echo '    <div class="collapse navbar-collapse" id="navbarSupportedContent">';
      echo '      <ul class="navbar-nav">';
      echo '        <li class="nav-item active">';
      echo "          <a class='nav-link' href='userprofile.php'> $user <span class='sr-only'>(current)</span></a>";
      echo "        </li>";
      echo '        <li class="nav-item active">';
      echo '          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>';
      echo "        </li>";
      echo '        <li class="nav-item">';
      echo '          <a class="nav-link" href="about.php">About</a>';
      echo "        </li>";

      echo '        <li class="nav-item">';
      echo '          <a class="nav-link" href="logout.php">Logout</a>';
      echo "        </li>";
      echo "      </ul>";
      echo "    </div>";
      echo "  </nav>";
  } else {
      echo '<nav class="navbar navbar-expand-lg navbar-light ">';
      echo '    <a class="navbar-brand" href="home.php">';
      echo "      <h1>Parking Lagbe</h1>";
      echo "    </a>";
      echo '    <button class="navbar-toggler btn-btn-success" type="button" data-toggle="collapse"';
      echo '      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"';
      echo '      aria-label="Toggle navigation">';
      echo '      <span class="navbar-toggler-icon"></span>';
      echo "    </button>";

      echo '    <div class="collapse navbar-collapse" id="navbarSupportedContent">';
      echo '      <ul class="navbar-nav">';
      echo '        <li class="nav-item active">';
      echo '          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>';
      echo "        </li>";
      echo '        <li class="nav-item">';
      echo '          <a class="nav-link" href="about.php">About</a>';
      echo "        </li>";
      echo '        <li class="nav-item">';
      echo '          <a class="nav-link" href="register.php">Register</a>';
      echo "        </li>";
      echo '        <li class="nav-item">';
      echo '          <a class="nav-link" href="login.php">Login</a>';
      echo "        </li>";
      echo "      </ul>";
      echo "    </div>";
      echo "  </nav>";
  } ?>
 <div class="container-fluid">
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..\image\caro_1.jpg" style="height: 470px;" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..\image\caro_2.jpg" style="height: 470px;" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..\image\caro_3.jpg" style="height: 470px;" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--form-->
        <form class="form-inline d-flex justify-content-center" action="search.php" method="post"> <!--home to search-->
        <div class="form-group">
          <label for="exampleFormControlInput1">Location &nbsp;</label> 
          <input type="text" class="form-control" id="exampleFormControlInput1"
              placeholder="Banani, Dhaka" required name="location"
              value="<?php echo isset($_POST["location"])
                  ? $_POST["location"]
                  : ""; ?>" /> <!--if else short form -->
        </div>
           <!-- Start Time Select -->
<div class="form-group" id="startTimeSelect">
  <label for="exampleFormControlSelect1">Start Time</label>
  <select class="form-control" id="exampleFormControlSelect1" name="starttime">
    <?php
    $startTimes = [
        "06:00:00",
        "07:00:00",
        "08:00:00",
        "09:00:00",
        "10:00:00",
        "11:00:00",
        "12:00:00",
        "13:00:00",
        "14:00:00",
        "15:00:00",
        "16:00:00",
        "17:00:00",
        "18:00:00",
        "19:00:00",
        "20:00:00",
        "21:00:00",
        "22:00:00",
        "23:00:00",
    ];

    foreach ($startTimes as $startTime) {
        $selected =
            isset($_POST["starttime"]) && $_POST["starttime"] == $startTime
                ? "selected"
                : "";
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
        "06:00:00",
        "07:00:00",
        "08:00:00",
        "09:00:00",
        "10:00:00",
        "11:00:00",
        "12:00:00",
        "13:00:00",
        "14:00:00",
        "15:00:00",
        "16:00:00",
        "17:00:00",
        "18:00:00",
        "19:00:00",
        "20:00:00",
        "21:00:00",
        "22:00:00",
        "23:00:00",
    ];

    foreach ($endTimes as $endTime) {
        $selected =
            isset($_POST["endtime"]) && $_POST["endtime"] == $endTime
                ? "selected"
                : "";
        echo "<option $selected>$endTime</option>";
    }
    ?>
  </select>
</div>

          <button type="submit" class="btn custom-btn-color form-group" name="submit">Search</button>
        </form>
<!--form-->

<!-- Card Group with Smaller Cards and Same Size Images -->
<div class="card-group justify-content-around">

  <!-- Card 1 -->
  <div class="card col-sm-6 col-md-4 py-0 px-0">
    <img class="card-img-top" src="..\image\givemoney.jpg" alt="Card image cap" style="height: 300px;">
    <div class="card-body">
      <h5 class="card-title">Rent a Parking space</h5>
      <p class="card-text">Got a vacant parking space? Rent it to the ones who are looking for parking spots and earn some extra bucks.</p>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="card col-sm-6 col-md-4 py-0 px-0">
    <img class="card-img-top " src="..\image\givecar.jpg" alt="Card image cap" style="height: 300px;">
    <div class="card-body">
      <h5 class="card-title">Book a Parking Space</h5>
      <p class="card-text">Worried about where to park your car safely? Look for available parking spots in your desired location and park your car in ease.</p>
    </div>
  </div>
</div>
<!--cards-->
<div class="randheight">
  
</div>
</div>
  <footer class="myfoot">
    <p>©&nbsp;Parking Lagbe 2023 &nbsp;| Developed by Shajreen, Mir and Abrar</p>
  </footer>
  <!--Stops form resubmission on refresh-->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

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
</body>

</html>