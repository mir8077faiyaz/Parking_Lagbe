<?php

require_once "connect.php";

error_reporting(E_ERROR | E_PARSE);

?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--always connect to external css using :    ..\relative path-->
  <link rel="stylesheet" type="text/css" href="../css/register.css" />

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <title>Register</title>
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
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </nav>

  <section class="" style="color: rgb(19, 1, 1)">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-9">
          <h1 class="text-black mb-4 ml-10" style="text-align: center; margin-bottom: 0">
            Register
          </h1>

          <div class="card bg-dark text-white" style="
                border-radius: 15px;
                background-color: black;
                margin-top: 0px;
              ">
            <div class="card-body">
              <form action="register.php" onsubmit="return validation();" method="post" >
                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0 text-white">First Name</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="text" class="form-control form-control-lg" id="fname" name="fname" />
                  </div>
                </div>

                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0 text-white">Last name Name</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="text" class="form-control form-control-lg" id="lname" name="lname"/>
                  </div>
                </div>

                <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Email address</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="email" class="form-control form-control-lg" id="mail" name="email"/>
                  </div>
                </div>
                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0 text-white pb-5">Password</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="password" onkeyup="checkpass();" class="form-control form-control-lg" id="pass" name="pass" />
                    <p class="text-muted" style="margin: top 0; margin-bottom: 0">
                      Enter password more than 8 chars and less than 15 chars
                      to proceed with Registration
                    </p>
                  </div>
                </div>
                <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0 text-white">Phone Number</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <input type="tel" class="form-control form-control-lg" id="phonenum" name="phone"/>
                  </div>
                </div>
                <div class="dropdown" style="margin-left: 250px !important; display: none" id="dropid">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <p id="mydrop">Register As</p>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button onclick="regFunction1()" type="button" class="dropdown-item" name="vowner">
                      Vehicle Owner
                    </button>
                    <button onclick="regFunction2()" type="button" class="dropdown-item" name="powner">
                      Spot Renter
                    </button>
                  </div>
                </div>
                <div id="vehicle-owner" style="display: none">
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Vehicle Number</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="vnum" name="vnum"/>
                    </div>
                  </div>
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Vehicle name</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="vname" name="vname"/>
                    </div>
                  </div>
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0">Upload Vehicle Photo</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input class="form-control form-control-lg" type="file" id="vphoto" name="vphoto"/>
                    </div>
                  </div>
                </div>
                <div id="parking-owner" style="display: none">
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Spot Location</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="slocation" name="slocation"/>
                    </div>
                  </div>
                  <div>
                    <h2>MAP API will be added here</h2>
                  </div>
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Space size</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="ssize" name="ssize"/>
                    </div>
                  </div>
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Cost Per Hour</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="scost" name="scost"/>
                    </div>
                  </div>
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Security</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="ssecure" name="ssecure"/>
                    </div>
                  </div>
                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0 text-white">Other Info</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" class="form-control form-control-lg" id="sothers" name="sothers" />
                    </div>
                  </div>

                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0">Upload Parking Space photo</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                      <input class="form-control form-control-lg" type="file" id="sphoto" name="sphoto"/>
                    </div>
                  </div>
                </div>
                <div class="px-5 py-2">
                  <button type="submit" class="btn btn-danger btn-lg" id="regbutton"
                    style="display: none; margin-left: -10px !important" name="submit">
                    Register
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="myfoot">
    <p>
      ©&nbsp;Parking Lagbe 2023 &nbsp;| Developed by Shajreen, Mir and Abrar
    </p>
  </footer>
  <!--Stops form resubmission on refresh-->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <!--For Different Registration options-->
  <script>
    var whichowner = -1; //to check which owner
    function regFunction1() {
      y = document.getElementById("parking-owner");
      y.style.display = "none";
      x = document.getElementById("vehicle-owner");
      x.style.display = "block";
      a = document.getElementById("regbutton");
      a.style.display = "block";
      whichowner = 1; // for vehicle owner
    }
    function regFunction2() {
      y = document.getElementById("parking-owner");
      y.style.display = "block";
      x = document.getElementById("vehicle-owner");
      x.style.display = "none";
      a = document.getElementById("regbutton");
      a.style.display = "block";
      whichowner = 0; // for parking space owner
    }
    function validation() {
      const ids = [];
      //0-4 main info
      //5-7 vehicle info
      //8-14 parking space info
      ids.push(
        "fname",
        "lname",
        "mail",
        "pass",
        "phonenum",
        "vnum",
        "vname",
        "vphoto",
        "slocation",
        "ssize",
        "scost",
        "ssecure",
        //"sfloor", //12
        "sothers",
        "sphoto"
      );
      const idvar = [];
      console.log(whichowner);
      for (var i = 0; i < ids.length; i++) {
        idvar[i] = document.getElementById(ids[i]);
        console.log(idvar[i]);
      }
      console.log(whichowner);
      //for basic form information
      if (
        idvar[0].value.trim() == "" ||
        idvar[1].value.trim() == "" ||
        idvar[2].value.trim() == "" ||
        idvar[3].value.trim() == "" ||
        idvar[4].value.trim() == ""
      ) {
        alert("Cannot leave fields blank");
        return false;
      }

      //for vehicle owner and parking space owner
      if (
        whichowner == 1 &&
        (idvar[5].value.trim() == "" ||
          idvar[6].value.trim() == "" ||
          idvar[7].value.files.length == 0)
      ) {
        alert("Cannot leave fields blank");
        return false;
      } else if (
        whichowner == 0 &&
        (idvar[8].value.trim() == "" ||
          idvar[9].value.trim() == "" ||
          idvar[10].value.trim() == "" ||
          idvar[11].value.trim() == "" ||
          idvar[12].value.trim() == "" ||
          idvar[13].value.files.length == 0)
      ) {
        alert("Cannot leave fields blank");
        return false;
      } else {
        return true;
      }
    }
    function checkpass() {
      var p = document.getElementById("pass");
      var drop = document.getElementById("dropid");

      if (!(p.value.length < 8 || p.value.length > 15)) {
        dropid.style.display = "block";
      } else {
        dropid.style.display = "none";
        y = document.getElementById("parking-owner");
        y.style.display = "none";
        x = document.getElementById("vehicle-owner");
        x.style.display = "none";
        a = document.getElementById("regbutton");
        a.style.display = "none";
      }
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


<?php
//print_r($_POST);
if(isset($_POST['submit'])){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $phone=$_POST['phone'];
  $vnum=$_POST['vnum'];
  $vname=$_POST['vname'];

  $vphoto=$_POST['vphoto'];
  $slocation=$_POST['slocation'];
  $ssize=$_POST['ssize'];
  $scost=$_POST['scost'];
  $ssecure=$_POST['ssecure'];
  $sothers=$_POST['sothers'];
  $sphoto=$_POST['sphoto'];
  
  // this if for parking owner only.
  if(empty($vnum) || empty($vname) || empty($vphoto)){
    //$sphoto = file_get_contents($_FILES['sphoto']['tmp_name']);
    //echo $sphoto;
    $sql1= "INSERT INTO `user`(`Fname`, `Lname`, `Email`, `Password`, `PhoneNum`, `VOwner`, `POwner`) VALUES ('$fname','$lname','$email','$pass','$phone','no','yes')";
     $result=mysqli_query($conn,$sql1);
     $sql2="SELECT `UID` FROM `user` where Email='$email'";
     $result2=mysqli_query($conn,$sql2);
     $row= mysqli_fetch_assoc($result2);
     $uid=$row['UID'];
     $sql3 = "INSERT INTO `parkingspotdetails`(`UID`, `Plocation`, `Pcoordinate`, `Pphoto`, `Psize`, `Costhour`, `Security`, `Others`) 
         VALUES ('$uid', '$slocation', ST_GeomFromText('POINT(40.71727401 -74.00898606)'), '../image/$sphoto', '$ssize', '$scost', '$ssecure', '$sothers')";

     $result3=mysqli_query($conn,$sql3);
  }
  // this else if for vehicle owner only.
  else if(empty($slocation) || empty($ssize) || empty($scost) || empty($ssecure) || empty($sothers) || empty($sphoto)){
    //$vphoto = file_get_contents($_FILES['vphoto']['tmp_name']);
    $sql1= "INSERT INTO `user`(`Fname`, `Lname`, `Email`, `Password`, `PhoneNum`, `VOwner`, `POwner`) VALUES ('$fname','$lname','$email','$pass','$phone','yes','no')";
     $result=mysqli_query($conn,$sql1);
     $sql2="SELECT `UID` FROM `user` where Email='$email'";
     $result2=mysqli_query($conn,$sql2);
     $row= mysqli_fetch_assoc($result2);
     $uid=$row['UID'];
     $sql3="INSERT INTO `vehicledetails`(`UID`, `VName`, `VNum`,`VPhoto`) VALUES ('$uid','$vname','$vnum','../image/$vphoto')";
     $result3=mysqli_query($conn,$sql3);

  }else{
    //$sphoto = file_get_contents($_FILES['sphoto']['tmp_name']);
    //$vphoto = file_get_contents($_FILES['vphoto']['tmp_name']);
    $sql1= "INSERT INTO `user`(`Fname`, `Lname`, `Email`, `Password`, `PhoneNum`, `VOwner`, `POwner`) VALUES ('$fname','$lname','$email','$pass','$phone','yes','yes')";
     $result=mysqli_query($conn,$sql1);
     $sql2="SELECT `UID` FROM `user` where Email='$email'";
     $result2=mysqli_query($conn,$sql2);
     $row= mysqli_fetch_assoc($result2);
     $uid=$row['UID'];
     $sql3 = "INSERT INTO `parkingspotdetails`(`UID`, `Plocation`, `Pcoordinate`, `Pphoto`, `Psize`, `Costhour`, `Security`, `Others`) 
     VALUES ('$uid', '$slocation', ST_GeomFromText('POINT(40.71727401 -74.00898606)'), '../image/$sphoto', '$ssize', '$scost', '$ssecure', '$sothers')";

     $result3=mysqli_query($conn,$sql3);

     $sql4="INSERT INTO `vehicledetails`(`UID`, `VName`, `VNum`,`VPhoto`) VALUES ('$uid','$vname','$vnum','../image/$vphoto')";
     $result3=mysqli_query($conn,$sql4);

  }
  // else for both parking owners and vehicle owners.
}


?>