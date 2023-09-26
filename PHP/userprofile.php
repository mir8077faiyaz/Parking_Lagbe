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

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <title>User Profile</title>
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

    <div class="row">
      <div class="verticalnav col-3">
        <div
          class="nav flex-column nav-pills"
          id="v-pills-tab"
          role="tablist"
          aria-orientation="vertical"
        >
          <a class="navbar-brand" href="userprofile.html"
            ><h3 style="color: aliceblue; margin-left: 1%">Username</h3></a
          >
          <a class="nav-link" href="history.php" aria-selected="true"
            >Parking History</a
          >
          <a class="nav-link" href="account.php" aria-selected="false"
            >Account Settings</a
          >
          <a class="nav-link" href="savedvehicles.php" aria-selected="false"
            >Saved Vehicles</a
          >
        </div>
      </div>
      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="v-pills-home"
            role="tabpanel"
            aria-labelledby="v-pills-home-tab"
          >
            ...
          </div>
          <div
            class="tab-pane fade"
            id="v-pills-profile"
            role="tabpanel"
            aria-labelledby="v-pills-profile-tab"
          >
            ...
          </div>
          <div
            class="tab-pane fade"
            id="v-pills-messages"
            role="tabpanel"
            aria-labelledby="v-pills-messages-tab"
          >
            ...
          </div>
          <div
            class="tab-pane fade"
            id="v-pills-settings"
            role="tabpanel"
            aria-labelledby="v-pills-settings-tab"
          >
            ...
          </div>
        </div>
      </div>
    </div>

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
