<?php
require_once "connect.php";
session_start();

if(isset($_SESSION['email']))
{ 
  // Set a cookie
  setcookie('username', $_SESSION['username'], time() + (86400 * 30), "/");
  setcookie('email', $_SESSION['email'], time() + (86400 * 30), "/");
  header("location: home.php");// as the session is already set the user is logged in
    exit;
}
if(isset($_COOKIE['username'])){
  setcookie('username', $_COOKIE['username'], time() + (86400 * 30), "/");
  setcookie('email', $_COOKIE['email'], time() + (86400 * 30), "/");
  header("location: home.php");// as the session is already set the user is logged in
    exit;
}
?>




<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--always connect to external css using :    ..\relative path-->
    <link rel="stylesheet" type="text/css" href="../Css/login.css" />

    <!-- Bootstrap CSS -->

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <title>Login</title>
  </head>

  <body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#"><h1>Parking Lagbe</h1></a>
      <button
        class="navbar-toggler btn-btn-success"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="home.php"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="vh-100 ">
      <div class="container  h-100"> 
        <div class="row d-flex justify-content-center align-items-top mt-4 h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card text-white" style=" border-radius: 1rem; margin-left: 35px;margin-right: 35px; height: 450px;">
              <div class="card-body p-3 py-2 text-center">
    
                <div class="mb-md-3 mt-md-2">
                  <form  method="post">
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-white-50 mb-3">Please enter your email and password!</p>
      
                    <div class="form-outline form-white mb-2">
                      <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" />
                      <label class="form-label" for="typeEmailX">Email</label>
                    </div>
      
                    <div class="form-outline form-white mb-2">
                      <input type="password" id="typePasswordX" class="form-control form-control-lg" name="pass"/>
                      <label class="form-label" for="typePasswordX">Password</label>
                    </div>
      
                    <p class="small mb-2 pb-lg-1"><a class="text-white-50" href="#!">Forgot password?</a></p>
      
                    <button class="btn btn-outline-light btn-lg px-5 lgbtn" name="submit" type="submit">Login</button>
                  </form>
                </div>
    
                <div>
                  <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                  </p>
                </div>
    
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!--Footer-->

<div class="randheight"></div>
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
  </body>
</html>

<?php
if(isset($_POST['submit'])) //submit from name
{
    $mail=$_POST['email'];
    $password=$_POST['pass'];
    $sql="Select * from `user` where Email='$mail' AND Password='$password'";
    $result= mysqli_query($conn,$sql);

    if($result){

      $count=mysqli_num_rows($conn->query($sql)); //return number of rows matched only if my uname and pass match
      
      if($count>0){
        $row= mysqli_fetch_assoc($result);
        $fname=$row["Fname"];
        $_SESSION["username"]=$fname;
        $_SESSION["email"] = $mail;
        $_SESSION["uemail"] = $mail;
        echo "<script>window.location.replace('login.php')</script>";
      }
      elseif($mail=="admin@admin.com" && $password=="admin123"){
        $_SESSION["username"]="admin";
        $_SESSION["email"] = "admin@admin.com";
        echo "<script>window.location.replace('admin.php')</script>";
      }
      else{
          echo '<script>alert("Incorrect email or password!")</script>';
      }
    }
   
    else{
        echo "ERROR: $sql <br> $conn->error";
    }

  }

?>