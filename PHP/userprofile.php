<?php
session_start();

?>


<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--always connect to external css using :    ..\relative path-->
  <link rel="stylesheet" type="text/css" href="../css/userprofile.css" />

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <title>User Profile</title>

</head>

<body class="d-flex flex-column justify-content-between" style="height:100vh" ;>
  <div>
    <!--Navbar-->
    <?php
    if (isset($_SESSION["username"])) {
      $user = $_SESSION["username"];
      $email = $_SESSION["email"];
      $_SESSION["uemail"] = $email;
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
    } else {

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

    <div class="row">
      <div class="col-2">
        <div class="verticalnav" style="height:100vh" ;>

          <a class="navbar-brand" href="userprofile.php">
            <h3 class="d-none d-md-block" style="color:bisque; font-size:2vw;">Hello <?php echo "$user" ?></h3>
          </a>
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <!-- <a class="nav-link" href="history.php" aria-selected="true" onclick="history_load()">Parking History</a>
        <a class="nav-link" href="account.php" aria-selected="false" onclick="rent_load()">Account Settings</a>
        <a class="nav-link" href="savedvehicles.php" aria-selected="false" onclick="vehicle_load()">Saved Vehicles</a> -->

            <a class="nav-link userprofile-link" id="accountsettings-link" aria-selected="false" onclick="return account_load()">Account Settings</a>
            <a class="nav-link userprofile-link" id="parkinghistory-link" aria-selected="true" onclick="return history_load()">Parking History</a>
            <a class="nav-link userprofile-link" id="rentinghistory-link" aria-selected="false" onclick="return renthis_load()">Renting History</a>
            <a class="nav-link userprofile-link" id="savedvehicles-link" aria-selected="false" onclick="return vehicle_load()">Saved Vehicle</a>
            <a class="nav-link userprofile-link" id="savedspot-link" aria-selected="true" onclick="return spot_load()">Saved Spot</a>
            <!-- <button type="button" class="nav-link" aria-selected="false" onclick="return account_load()">Account Settings</button> -->

          </div>
        </div>
      </div>

      <!-- Implementing lazyloading -->

      <div id="container"></div>
      <script>
        function resetLinkClasses() {
          let links = document.querySelectorAll(".userprofile-link");
          links.forEach(link => {
            link.classList.remove("active");
          })
        }
        window.addEventListener('load', function() {
          account_load();
        });
        account_load = () => {
          resetLinkClasses()
          document.getElementById("accountsettings-link").classList.add("active");
          $("#container").load("account.php div.card");
          return false;
        };

        history_load = () => {
          resetLinkClasses()
          document.getElementById("parkinghistory-link").classList.add("active");
          $("#container").load("history.php div.card");
          return false;
        };

        renthis_load = () => {
          resetLinkClasses()
          document.getElementById("rentinghistory-link").classList.add("active");
          $("#container").load("renthistory.php div.cardgroup");
          return false;
        };

        spot_load = () => {
          resetLinkClasses()
          document.getElementById("savedspot-link").classList.add("active");
          $("#container").load("savedspot.php div.card");
          return false;
        };

        vehicle_load = () => {
          resetLinkClasses()
          document.getElementById("savedvehicles-link").classList.add("active");
          $("#container").load("savedvehicles.php div.card");
          return false;
        };
      </script>
    </div>
  </div>
  <footer class="myfoot">
    <p>
      ©&nbsp;Parking Lagbe 2023 &nbsp;| Developed by Shajreen, Mir and Abrar
    </p>
  </footer>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>