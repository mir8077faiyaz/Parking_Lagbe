<?php
session_start();
date_default_timezone_set('Asia/Dhaka'); //get current time
require_once "connect.php";
?>


<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--always connect to external css using :    ..\relative path-->
  <link rel="stylesheet" type="text/css" href="../css/home.css" />

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <title>Home</title>
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
 
  <!-- Jumbotron -->
  <div class="p-5 text-center bg-image rounded-3 jumbo">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
      <div class="d-flex justify-content-left align-items-top h-50 w-50 formz">
        <form class="search" action="search.php" method="post">
          <div class="form-group">
            <label for="exampleFormControlInput1">Location</label>
            <input type="text" class="form-control" id="exampleFormControlInput1 "
              placeholder="banani,dhaka,bangladesh" required name="location" />
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Start Time</label>
            <select class="form-control" id="exampleFormControlSelect1" name="starttime" required>
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
          <div class="form-group">
            <label for="exampleFormControlSelect1">End Time</label>
            <select class="form-control" id="exampleFormControlSelect1"  name="endtime" required>
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

    </div>
  </div>
  </div>
  <!-- Jumbotron -->
  <!--Cards-->
  <div class="card-group container-fluid mt-5">
    <div class="card c1">
      <img class="card-img-top" src="..\image\givemoney.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Rent a Parking space</h5>
        <p class="card-text">Got a vacant parking space? Rent it to the ones who are looking for parking spots and earn some extra bucks  .</p>
      </div>
    </div>
    <div class="card c2">
      <img class="card-img-top" src="..\image\givecar.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Book a Parking Space</h5>
        <p class="card-text">Worried about where to park your car safely? Look for available parking spots in your desired location and park your car in ease.</p>

      </div>
    </div>
  </div>
  <!--Cards-->
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